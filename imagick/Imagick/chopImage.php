<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->chopImage(200, 200, 100, 100);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();

