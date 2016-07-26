<?php

/*$isDown = $_GET['isDown'];
$file = $_GET['file'];

echo 'is :'.$isDown;

	if($isDown) {
		echo 'inner : '.$file;
		if(is_file('./'.$file)) {

			unlink('./'.$file);
			echo 'delete';
		}
	}
*/

if($_POST['submit']) {

	$date = $_POST['date'];
	$row_num = $_POST['row'];
	$prefix = $_POST['prefix'];
	$extention = $_POST['extention'];

	$src = 'https://dolce-gusto-event.s3.amazonaws.com/newsletter/'.$date.'/'.$prefix;

	$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

		<head>
		    <meta https-equiv="Content-Type" content="text/html; charset=euc-kr">
		    <title>Dolce Gusto</title>
		</head>

		<body style="margin:0; padding:0;">
		    <table width="740" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="margin:0 auto; border-collapse:collapse; border-spacing:0;">
		    <tbody>';

	$footer = '</tbody>
							</table>
			    <table width="740" border="0" cellspacing="0" cellpadding="0" style="background-color:#1b1b1b; margin:0 auto;  border-collapse:collapse; border-spacing:0;">
			        <tr>
			            <td style="text-align:center; vertical-align:top;">
			                <a href="https://www.dolce-gusto.co.kr/?utm_source=ReminderNewsletter&utm_medium=WebShop&utm_campaign=2016_SplashParty" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon1.png" border="0" style="vertical-align:top;" /></a>
			                <a href="https://www.dolce-gusto.co.kr/m/?utm_source=ReminderNewsletter&utm_medium=WebShop&utm_campaign=2016_SplashParty" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon2.png" border="0" style="vertical-align:top;" /></a>
			                <a href="https://www.facebook.com/NescafeDolcegustoKorea/?utm_source=ReminderNewsletter&utm_medium=facebook&utm_campaign=2016_SplashParty" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon3.png" border="0" style="vertical-align:top;" /></a>
			                <a href="http://cafe.naver.com/dolcegusto/?utm_source=ReminderNewsletter&utm_medium=NaverCafeMain&utm_campaign=2016_SplashParty" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon4.png" border="0" style="vertical-align:top;" /></a>
			            </td>
			        </tr>
			        <tr>
			            <td style="width: 740px; height: 27px;"></td>
			        </tr>
			        <tr>
			            <td>
			                <a href="mailto:dolce-admin@kr.nestle.com" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/footer_img1.jpg" border="0" style="vertical-align:top;" /></a>
			            </td>
			        </tr>
			        <tr>
			            <td>
			                <img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/footer_img2.jpg" border="0" style="vertical-align:top;" />
			            </td>
			        </tr>
			    </table>
			    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
			        <tbody>
			            <tr>
			                <td valign="top" width="247"><img src="https://slocal101.cdnworks.com/nestle/dolce-gusto/newsletter/blank.gif" width="247" height="0" border="0"></td>
			                <td valign="top" width="247"><img src="https://slocal101.cdnworks.com/nestle/dolce-gusto/newsletter/blank.gif" width="247" height="0" border="0"></td>
			                <td valign="top" width="247"><img src="https://slocal101.cdnworks.com/nestle/dolce-gusto/newsletter/blank.gif" width="247" height="0" border="0"></td>
			            </tr>
			        </tbody>
			    </table>
			</body>
			</html>';

	$fileName = 'news_'. $date. '.html';

	// 파일 생성
	function makeFile($filename, $rows, $header, $footer) {
		$file = fopen($filename, 'w');
		fwrite($file, $header. $rows. $footer);
		fclose($file);
	}

	// tr td 생성
	function createRow($src, $len, $extention) {
		$row = '';
		for($cnt = 1; $cnt <= $len; $cnt++) {
			$row= $row. '<tr><td><img src="'.$src.$cnt.$extention.'"></td></tr>';
		}
		return $row;
	}

	$result_row = createRow($src, $row_num, $extention);

	makeFile($fileName, $result_row, $header, $footer);

	$isDown = false;

	/*if(file_exists($fileName)) {

		echo '<a class="down" href="'.$fileName .'" download>download</a>';

		$isDown = true;
	}

	if($isDown && is_file('./'.$fileName)) {
			unlink('./'.$fileName);
	} else {
			echo 'no file';
	}*/
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="./style.css" />
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<legend>정보 입력</legend>
			<table>
				<caption>뉴스레터 정보 입력</caption>
				<colgroup>
					<col />
					<col />
				</colgroup>
				<tbody>
					<tr>
						<th scope="row"><label for="date">folder date</label></th>
						<td><input type="text" id="date" name="date" placeholder="20160701"></td>
					</tr>
					<tr>
						<th scope="row"><label for="row">row num</label></th>
						<td><input type="text" id="row" name="row" placeholder="0 ~ 9"></td>
					</tr>
					<tr>
						<th scope="row"><label for="prefix">파일명</label></th>
						<td><input type="text" id="prefix" name="prefix" placeholder="img_"></td>
					</tr>
					<tr>
						<th scope="row"><label for="extention">확장자</label></th>
						<td>
						<select name="extention" id="extention">
							<option>선택하세요</option>
							<option value=".jpg">jpg</option>
							<option value=".png">png</option>
							<option value=".gif">gif</option>
						</select>
						<!-- <input type="text" id="extention" name="extention"> -->
						</td>
					</tr>
				</tbody>
			</table>
			<input type="submit" name="submit" value="생성">
		</fieldset>
	</form>

<?php
if(file_exists($fileName)) {
?>
	<div class="dim"></div>

	<div class="pop">
		<h1>파일을 다운로드 합니다.</h1>
		<a class="down" href="<?php echo $fileName; ?>" onclick="reload();" download>download</a>
	</div>
<?php
	//$isDown = true;
}


?>
<script>
	function reload() {
		setTimeout(function(){
			location.href = '/newsLetter/index.php';
		}, 400);
	}

</script>
</body>
</html>
