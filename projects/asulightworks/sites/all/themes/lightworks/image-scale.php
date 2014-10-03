<?php

	error_reporting(0);

	$filename = $_GET['i'];
		
	// *** Include the class
	include("classes/class.image-resize.php");
	$resizeObj = new resize($filename);
	//
	$ext = $resizeObj-> getExtension($filename);
	$dimensions = getimagesize($filename);
	$size = ($_GET['s']) ? $_GET['s'] : $dimensions['0'];
	//
	$resizeObj -> resizeImage($size, $size, 'auto');
	$resizeObj -> outputImage($ext, 60);
	
?>