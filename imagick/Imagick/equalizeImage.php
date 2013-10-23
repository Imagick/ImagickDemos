<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->equalizeImage();

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();