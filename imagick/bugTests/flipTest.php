<?php
$imagick = new Imagick(realpath("TestImage.jpg"));
//$imagick->chopImage(100, 50, 100, 50);

$imagick->transposeImage();


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();