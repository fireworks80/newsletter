<?php

$date = trim($_GET['date']);
$row_num = trim($_GET['row']);
$prefix = trim($_GET['prefix']);
$extention = trim($_GET['extention']);
$icon1Url = trim($_GET['ico1']);
$icon2Url = trim($_GET['ico2']);
$icon3Url = trim($_GET['ico3']);
$icon4Url = trim($_GET['ico4']);
$email = trim($_GET['email']);

if(empty($icon1Url)) {
	$icon1Url = 'https://www.dolce-gusto.co.kr/';
}

if(empty($icon2Url)) {
	$icon2Url = 'https://www.dolce-gusto.co.kr/';
}
if(empty($icon3Url)) {
	$icon3Url = 'https://www.facebook.com/NescafeDolcegustoKorea';
}
if(empty($icon4Url)) {
	$icon4Url = 'http://cafe.naver.com/dolcegusto';
}

if(empty($email)) {
	$email = 'dolce-admin@kr.nestle.com';
}

$btmColor = $_GET['btmColor'];
$btmColor = trim($btmColor);

$src = 'https://dolce-gusto-event.s3.amazonaws.com/newsletter/'.$date.'/'.$prefix;

$header = '<div style="width: 740px; margin: 0 auto;"><table width="740" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="margin:0 auto; border-collapse:collapse; border-spacing:0;">
		    <tbody>';

$footer = '<tr><td style="text-align:center; vertical-align:top; background:#'.$btmColor.';">
			                <a href="'.$icon1Url.'" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon1.png" border="0" style="vertical-align:top;" /></a>
			                <a href="'.$icon2Url.'" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon2.png" border="0" style="vertical-align:top;" /></a>
			                <a href="'.$icon3Url.'" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon3.png" border="0" style="vertical-align:top;" /></a>
			                <a href="'.$icon4Url.'" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon4.png" border="0" style="vertical-align:top;" /></a>
			            </td>
			        </tr>
			        <tr>
			            <td style="width: 740px; height: 27px; padding: 0; background:#'.$btmColor.'"></td>
			        </tr>
			        <tr>
			            <td style="padding: 0;">
			                <a href="mailto:'.$email.'" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/footer_img1.jpg" border="0" style="vertical-align:top;" /></a>
			            </td>
			        </tr>
			        <tr>
			            <td style="padding: 0;">
			                <img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/footer_img2.jpg" border="0" style="vertical-align:top;" />
			            </td>
			        </tr>
						</tbody>
				</table>
			</div>';

				// tr td 생성
	function createRow($src, $len, $extention) {
		$row = '';
		for($cnt = 1; $cnt <= $len; $cnt++) {
			$row= $row. '<tr><td style="padding: 0; margin: 0;"><img style="vertical-align:top" src="'.$src.$cnt.$extention.'"></td></tr>';
		}
		return $row;
	}

	$result_row = createRow($src, $row_num, $extention);

			echo $header. $result_row. $footer;
?>
