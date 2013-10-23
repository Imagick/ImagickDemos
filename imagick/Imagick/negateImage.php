<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->negateImage(false, \Imagick::CHANNEL_RED);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();