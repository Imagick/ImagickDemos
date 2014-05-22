<?php


function adaptiveBlurImage($imagePath, $radius, $sigma) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->adaptiveBlurImage($radius, $sigma);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}