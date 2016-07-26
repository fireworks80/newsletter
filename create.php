<?php

$date = $_GET['date'];
$row_num = $_GET['row'];
$prefix = $_GET['prefix'];
$extention = $_GET['ext'];

/*$date = $_POST['date'];
	$row_num = $_POST['row'];
	$prefix = $_POST['prefix'];
	$extention = $_POST['extention'];*/

$src = 'https://dolce-gusto-event.s3.amazonaws.com/newsletter/'.$date.'/'.$prefix;

/*	$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

		<head>
		    <meta https-equiv="Content-Type" content="text/html; charset=euc-kr">
		    <title>Dolce Gusto</title>
		</head>

		<body style="margin:0; padding:0;">
		    <table width="740" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="margin:0 auto; border-collapse:collapse; border-spacing:0;">
		    <tbody>';*/

$header = '<div style="width: 740px; margin: 0 auto;"><table width="740" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="margin:0 auto; border-collapse:collapse; border-spacing:0;">
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
			            <td style="width: 740px; height: 27px; padding: 0;"></td>
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
			    </table>
			    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
			        <tbody>
			            <tr>
			                <td valign="top" width="247"><img src="https://slocal101.cdnworks.com/nestle/dolce-gusto/newsletter/blank.gif" width="247" height="0" border="0"></td>
			                <td valign="top" width="247"><img src="https://slocal101.cdnworks.com/nestle/dolce-gusto/newsletter/blank.gif" width="247" height="0" border="0"></td>
			                <td valign="top" width="247"><img src="https://slocal101.cdnworks.com/nestle/dolce-gusto/newsletter/blank.gif" width="247" height="0" border="0"></td>
			            </tr>
			        </tbody>
			    </table></div>';

	/*$footer = '</tbody>
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
			</html>';*/

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
