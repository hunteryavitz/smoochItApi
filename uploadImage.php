<?php 

$image_base64 = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$image_base64 =  $_POST["image_data"];
	
	$bin = base64_decode($image_base64);

	$image = imageCreateFromString($bin);
	if (!$image) {
		die('Base64 value is not a valid image');
	}

	// saves the image file as png
	$image_file = 'image.png';
	imagepng($image, $image_file, 0);

	
	echo '<h3>image base64</h3>';
	echo '<img src="' . $image_file . '"/>';
	
}


?>