<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->gaussianBlurImage(10, 6, Imagick::CHANNEL_GREEN);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();