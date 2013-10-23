<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->flipImage();

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();