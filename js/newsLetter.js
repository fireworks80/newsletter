var EventUtil = {
    getEvent: function(e) {
        return e || window.event;
    },
    getTarget: function(evt) {
        return evt.target || evt.srcElement;
    },
    addHandler: function(elem, type, fn) {
        if (elem.addEventListener) {

            elem.addEventListener(type, fn, false);

        } else if (elem.attachEvent) {

            elem.attachEvent('on' + type, fn);

        } else {

            elem['on' + type] = fn;

        }
    }
};

// http request 객체 가져 오기
var createRequest = function() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        return new ActiveXObject('Microsoft.XMLHTTP');
    }
};

// 생성 파일 화면에 미리보기
var prewindow = function() {
    var request = null;

    // 미리보기 파일 생성할 버튼
    var create = document.querySelector('.create');

    // 생성된 파일을 보여 줄 div
    var output = document.querySelector('.output');

    create.addEventListener('click', function() {
        request = createRequest();

        if (request === null) { alert('sorry not hav request'); }

        request.onreadystatechange = function() {
            if (request.readyState === 4) {
                if (request.status === 200) {

                    output.innerHTML = request.responseText;

                    output.addEventListener('click', insertLink, false);

                } else {
                    alert('err');
                }
            }
        };

        // input 입력 값
        var date = document.querySelector('#date').value;
        var row = document.querySelector('#row').value;
        var prefix = document.querySelector('#prefix').value;
        var ext = document.querySelector('#extention').value;
        var url = './create.php?date=' + date + '&row=' + row + '&prefix=' + prefix + '&ext=' + ext;

        var fdate = document.querySelector('.fdate');
        fdate.value = date;

        request.open('GET', url);
        request.send();
    }, false);
};

var insertLink = function(e) {

    var evt = EventUtil.getEvent(e);
    var target = EventUtil.getTarget(evt);

    // 미리보기 화면에서
    // 이미지 클릭시 input이 나타날 td 안의 이미지
    var img = target;

    // a 링크 생성시 a 태그 및 img 파일을 갖고 있는 td
    var td = target.parentNode;
    td.style.position = 'relative';

    // 클릭한 대상 찾기
    switch (target.nodeName.toLowerCase()) {
        case 'img':
            // 클릭 대상이 img 면 input 생성
            var input = document.createElement('input');
            input.type = 'text';
            input.style.position = 'absolute';
            input.style.top = 0;
            input.style.left = 0;
            input.style.width = '100%';
            td.appendChild(input);
            break;
        case 'input':
            // input 에 경로를 넣고 blur 하면 input 사라짐
            target.addEventListener('blur', function() {

                var a = document.createElement('a');
                var img = this.previousElementSibling;
                a.setAttribute('target', '_blank');
                a.href = this.value;

                a.appendChild(img);
                td.appendChild(a);
                td.removeChild(td.firstChild);
            }, false);
            break;
    }
};

prewindow();
insertLink();
