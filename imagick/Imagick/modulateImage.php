<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->modulateImage(128, 128, 128);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();

