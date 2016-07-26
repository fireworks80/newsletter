<?php
	// 다운받을 파일 명
	$fileName = $_GET['filename'];
	$isDel = false;
	$clear = $_POST['clear'];

	if($clear) {
		unlink($fileName);
		echo '<script>alert(\'파일이 삭제 되었습니다\');</script>';
	}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="./css/style.css" />
	<script src="./js/newsLetter.js"></script>
</head>
<body>
<form action="create.php" method="post" class="info-form">
	<!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> -->
		<fieldset>
			<legend class="is--hidden">정보 입력</legend>
			<table>
				<caption>뉴스레터 정보 입력</caption>
				<colgroup>
					<col />
					<col />
				</colgroup>
				<tbody>
					<tr>
						<th scope="row"><label for="date">folder date</label></th>
						<td><input class="field" type="text" id="date" name="date" placeholder="20160701"></td>
					</tr>
					<tr>
						<th scope="row"><label for="row">row num</label></th>
						<td><input class="field" type="text" id="row" name="row" placeholder="0 ~ 9"></td>
					</tr>
					<tr>
						<th scope="row"><label for="prefix">파일명</label></th>
						<td><input class="field" type="text" id="prefix" name="prefix" placeholder="img_"></td>
					</tr>
					<tr>
						<th scope="row"><label for="extention">확장자</label></th>
						<td>
						<select class="field" name="extention" id="extention">
							<option>선택하세요</option>
							<option value=".jpg">jpg</option>
							<option value=".png">png</option>
							<option value=".gif">gif</option>
						</select>
						</td>
					</tr>
					<tr>
						<th scope="row"><label for="btmColor">bottom color</label></th>
						<td><input class="field" type="text" name="btmColor" id="btmColor" placeholder="#은 빼고 넣어 주세요"></td>
					</tr>
				</tbody>
			</table>
			<button type="button" class="btn btn--prewindow">미리보기</button>
		</fieldset>
	</form>

	<div class="output"></div>

<form action="make_file.php" method="post" class="form-send">
<input type="hidden" name="fdate" class="fdate">
	<input type="hidden" name="mk" class="mk">
	<button class="btn btn--send" type="submit" onclick="send();">파일 생성</button>
</form>
<?php
if(file_exists($fileName)) {
?>
	<div class="dim"></div>

	<div class="pop">
		<div class="down is--active">
		<p>파일을 다운로드 합니다.</p>
		<a class="btn btn--down" href="<?php echo $fileName; ?>" download>download</a>
		</div>
		<div class="clear">
			<p>파일을 삭제 합니다</p>
			<form action="clear.php" method="post">
				<input type="hidden" name="delFile" value="<?php echo $fileName; ?>">
				<input type="submit" class="btn btn--clear" value="삭제">
			</form>
		</div>
	</div>
<?php
}
?>

<script src="./js/newsLetter.js"></script>
<script>
var makeBtn = document.querySelector('.btn--send');
var output = document.querySelector('.output');

function send(){
	var hidden = document.querySelector('.mk');
	hidden.value = output.innerHTML;
}

var downBtn = document.querySelector('.btn--down');

EventUtil.addHandler(downBtn, 'click', function(){
	var clear = document.querySelector('.clear');
	var down = document.querySelector('.down');

	clear.className += ' is--active';

	down.className = 'down';
});

</script>
</body>
</html>
