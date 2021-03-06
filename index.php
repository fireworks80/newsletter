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
<form class="info-form" method="get">
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
						<th scope="row"><label for="ico1"><span class="icon icon--1"></span>icon 1 url:</label></th>
						<td><input class="field" type="text" id="ico1" name="ico1"></td>
					</tr>
					<tr>
						<th scope="row"><label for="ico2"><span class="icon icon-2"></span>icon 2 url:</label></th>
						<td><input class="field" type="text" id="ico2" name="ico2"></td>
					</tr>
					<tr>
						<th scope="row"><label for="ico3"><span class="icon icon--3"></span>icon 3 url:</label></th>
						<td><input class="field" type="text" id="ico3" name="ico3"></td>
					</tr>
					<tr>
						<th scope="row"><label for="ico4"><span class="icon icon--4"></span>icon 4 url:</label></th>
						<td><input class="field" type="text" id="ico4" name="ico4"></td>
					</tr>
					<tr>
						<th scope="row"><label for="btmColor">bottom color</label></th>
						<td><input class="field" type="text" name="btmColor" id="btmColor" placeholder="#은 빼고 넣어 주세요"></td>
					</tr>
					<tr>
						<th scope="row"><label for="email">email:</label></th>
						<td><input class="field" type="text" id="email" name="email"></td>
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
		<a class="btn btn--down" onclick="dl();" href="<?php echo $fileName; ?>" download>download</a>
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
// 미리 보기
EventUtil.addHandler(window, 'load',prewindow);

	function send(){
		var hidden = document.querySelector('.mk');
		var output = document.querySelector('.output');
		hidden.value = output.innerHTML;
	}

	function dl(){
		var downBtn = document.querySelector('.btn--down');
		var clear = document.querySelector('.clear');
		var down = document.querySelector('.down');

		clear.className += ' is--active';

		down.className = 'down';
	};

</script>
</body>
</html>
