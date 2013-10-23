<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$remapColor = [
    1, 0, 0,
    0, 0, 1,
    0, 1, 0,

];

$imagick->recolorImage($remapColor);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();