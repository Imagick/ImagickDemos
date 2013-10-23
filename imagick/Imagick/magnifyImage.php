<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->magnifyImage();

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();

