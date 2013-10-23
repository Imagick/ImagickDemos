<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->shaveImage(100, 50);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();