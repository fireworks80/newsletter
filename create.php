<?php

$date = trim($_GET['date']);
$row_num = trim($_GET['row']);
$prefix = trim($_GET['prefix']);
$extention = trim($_GET['extention']);
$btmColor = $_GET['btmColor'];
$btmColor = trim($btmColor);

$src = 'https://dolce-gusto-event.s3.amazonaws.com/newsletter/'.$date.'/'.$prefix;

$header = '<div style="width: 740px; margin: 0 auto;"><table width="740" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="margin:0 auto; border-collapse:collapse; border-spacing:0;">
		    <tbody>';

$footer = '<tr><td style="text-align:center; vertical-align:top; background:#'.$btmColor.';">
			                <a href="https://www.dolce-gusto.co.kr/?utm_source=ReminderNewsletter&utm_medium=WebShop&utm_campaign=2016_SplashParty" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon1.png" border="0" style="vertical-align:top;" /></a>
			                <a href="https://www.dolce-gusto.co.kr/m/?utm_source=ReminderNewsletter&utm_medium=WebShop&utm_campaign=2016_SplashParty" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon2.png" border="0" style="vertical-align:top;" /></a>
			                <a href="https://www.facebook.com/NescafeDolcegustoKorea/?utm_source=ReminderNewsletter&utm_medium=facebook&utm_campaign=2016_SplashParty" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon3.png" border="0" style="vertical-align:top;" /></a>
			                <a href="http://cafe.naver.com/dolcegusto/?utm_source=ReminderNewsletter&utm_medium=NaverCafeMain&utm_campaign=2016_SplashParty" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/icon4.png" border="0" style="vertical-align:top;" /></a>
			            </td>
			        </tr>
			        <tr>
			            <td style="width: 740px; height: 27px; padding: 0; background:#'.$btmColor.'"></td>
			        </tr>
			        <tr>
			            <td style="padding: 0;">
			                <a href="mailto:dolce-admin@kr.nestle.com" target="_blank"><img src="https://dolce-gusto-event.s3.amazonaws.com/newsletter/20160718/footer_img1.jpg" border="0" style="vertical-align:top;" /></a>
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
