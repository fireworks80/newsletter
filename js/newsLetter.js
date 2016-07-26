var EventUtil = {
    getEvent: function(e) {
        return e || window.event;
    },
    getTarget: function(evt) {
        return evt.target || evt.srcElement;
    },
    addHandler: function(elem, type, fn) {
        if (document.addEventListener) {

            elem.addEventListener(type, fn, false);

        } else if (document.attachEvent) {

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

// 이미지 클릭시 뜨는 input
// 에 href 경로 넣고 해당 td 에 삽입

var insertLink = function(e) {
    var evt = EventUtil.getEvent(e);
    var img = EventUtil.getTarget(evt);
    var td = img.parentNode;

    var a = document.createElement('a');
    a.setAttribute('target', '_blank');

    var input = img.nextSibling;

    EventUtil.addHandler(input, 'blur', function(e) {
        var evt = EventUtil.getEvent(e);
        var target = EventUtil.getTarget(evt);

        var value = target.value.trim();

        if (value.length !== 0) {
            a.href = value;
            a.appendChild(img);
            td.appendChild(a);
        }

        td.style.position = '';
        td.style['boxShadow'] = '';

        // input 삭제
        for(var i = 0, len = td.children.length; i < len; i++) {
            var el = td.children[i];

            if(el.nodeName.toLowerCase() === 'input') {
                td.removeChild(el);
            }
        }

    });
};

var createInput = function(e) {

    // 미리보기 화면에서
    // 이미지 클릭시 input이 나타날 td 안의 이미지
    var evt = EventUtil.getEvent(e);
    var target = EventUtil.getTarget(evt);

    // a 링크 생성시 a 태그 및 img 파일을 갖고 있는 td
    var td = target.parentNode;
    td.style.position = 'relative';
    td.style['boxShadow'] = '0 0 30px rgb(69, 128, 239)';

    // 클릭한 대상 찾기
    switch (target.nodeName.toLowerCase()) {
        case 'img':
            // 클릭 대상이 img 면 input 생성
            var input = document.createElement('input');

            input.type = 'text';
            input.className = 'field-addr';

            td.appendChild(input);
            input.focus();
            insertLink();

            break;
    }
};

// 생성 파일 화면에 미리보기
var prewindow = function() {
    var request = null;

    // 미리보기 파일 생성할 버튼
    var create = document.querySelector('.btn--prewindow');

    // 생성된 파일을 보여 줄 div
    var output = document.querySelector('.output');

    // 뉴스레터 정보 입력하는 폼
    var infoForm = document.querySelector('.info-form');

    EventUtil.addHandler(create, 'click', function() {
        request = createRequest();

        if (request === null) { alert('sorry not hav request'); }

        request.onreadystatechange = function() {
            if (request.readyState === 4 && request.status === 200) {

                output.innerHTML = request.responseText;

                output.addEventListener('click', createInput, false);
            }
        };

        // 파일 생성시 링크 번호 넣기
        var fdate = document.querySelector('.fdate');

        var url = './create.php?';

        // input 입력 값
        for (var i = 0, len = infoForm.elements.length; i < len; i++) {

            var field = infoForm.elements[i];

            if (i === 1) {
                url += field.name + '=' + field.value;
                fdate.value = field.value;

            } else if (i > 1 && field.value !== '') {
                url += '&' + field.name + '=' + field.value;
            }
        }
        // console.log(url);
        var sendForm = document.querySelector('.form-send');
        sendForm.className += ' is--active';

        request.open('GET', url);
        request.send();
    });

};

// 미리 보기
prewindow();
