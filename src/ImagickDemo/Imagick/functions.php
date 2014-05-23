<?php

namespace ImagickDemo\Imagick {
 
    class functions {
        static function load() {}
    }
}

namespace {


function adaptiveBlurImage($imagePath, $radius, $sigma) {
    $imagick = new \Imagick(realpath($imagePath));
    $imagick->adaptiveBlurImage($radius, $sigma);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}




}



 