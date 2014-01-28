<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));


$clutImagick = new Imagick(realpath("../images/TestImage4.gif"));

$imagick->clutImage($clutImagick);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();

