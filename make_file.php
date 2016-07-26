<?php

$mkFile = $_POST['mk'];
$date = $_POST['fdate'];
// echo $date;


$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

		<head>
		    <meta https-equiv="Content-Type" content="text/html; charset=euc-kr">
		    <title>Dolce Gusto</title>
		</head>

		<body style="margin:0; padding:0;">';

$footer = '
			</body>
			</html>';


	$fileName = 'news_'. $date. '.html';

	$file = fopen($fileName, 'w');
	fwrite($file, $header. $mkFile. $footer);
	fclose($file);

	header('Location:./index_1.1.php?filename='.$fileName);
 ?>
