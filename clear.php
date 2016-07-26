<?php
	$file = $_POST['delFile'];
	unlink($file);

	header('Location:./index.php');
?>
