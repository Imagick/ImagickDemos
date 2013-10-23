<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->uniqueimagecolors();

//sheader("Content-Type: image/jpg");


$pixelIterator = $imagick->getpixeliterator();



foreach ($pixelIterator as $pixel) {
    echo ".";
}