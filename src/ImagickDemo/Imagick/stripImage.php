<?php

namespace ImagickDemo\Imagick;

class stripImage extends \ImagickDemo\Example {


    function renderTitle() {
        return "Adaptive blur image";
    }

    function render() {
//Example Imagick::stripImage
        $imagick = new \Imagick(realpath("../imagick/images/Biter_500.jpg"));
        $bytes = $imagick->getImageBlob();
        echo "Image byte size before stripping: ".strlen($bytes)."<br/>";
        $imagick->stripImage();
        $bytes = $imagick->getImageBlob();
        echo "Image byte size after stripping: ".strlen($bytes)."<br/>";
//Example end
    }
}