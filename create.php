<?php

$date = trim($_GET['date']);
$row_num = trim($_GET['row']);
$prefix = trim($_GET['prefix']);
$extention = trim($_GET['extention']);
$email = $_GET['email'];

$ico1 = str_replace('|', '&amp;',$_GET['ico1']);
$ico2 = str_replace('|', '&amp;',$_GET['ico2']);
$ico3 = str_replace('|', '&amp;',$_GET['ico3']);
$ico4 = str_replace('|', '&amp;',$_GET['ico4']);

if(empty($ico1)) {
	$ico1 = 'https://www.dolce-gusto.co.kr/';
}

if(empty($ico2)) {
	$ico2 = 'https://www.dolce-gusto.co.kr/';
}
if(empty($ico3)) {
	$ico3 = 'https://www.facebook.com/NescafeDolcegustoKorea';
}
if(empty($ico4)) {
	$ico4 = 'http://cafe.naver.com/dolcegusto';
}

if(empty($email)) {
	$email = 'dolce-admin@kr.nestle.com';
}

$btmColor = $_GET['btmColor'];
$btmColor = trim($btmColor);

$src = 'https://dolce-gusto-event.s3.amazonaws.com/newsletter/'.$date.'/'.$prefix;

$header = '<div style="width: 740px; margin: 0 auto;"><table width="740" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="margin:0 auto; border-collapse:collapse; border-spacing:0;">
		    <tbody>';


$footer_top = '<tr>
                    <td bgcolor="#'.$btmColor.'" style="padding: 0; margin: 0;">
                        <table bgcolor="#'.$btmColor.'" border="0" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0;">
                            <tbody>
                                <tr>
                                    <td style="text-align:center; vertical-align:top;">
                                        <a href="'.$ico1.'" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/'.$date.'/icon1.png" border="0" style="vertical-align:top;"></a>
                                        <a href="'.$ico2.'" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/'.$date.'/icon2.png" border="0" style="vertical-align:top;"></a>
                                        <a href="'.$ico3.'" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/'.$date.'/icon3.png" border="0" style="vertical-align:top;"></a>
                                        <a href="'.$ico4.'" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/'.$date.'/icon4.png" border="0" style="vertical-align:top;"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 740px; height: 27px; padding: 0;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>';


$footer_bottom = '<tr>
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

$footer = $footer_top. $footer_bottom;

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
