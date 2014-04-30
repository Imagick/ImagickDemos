<?php

namespace ImagickDemo\Imagick;


class pingImage extends \ImagickDemo\Example {

    function renderImageURL() {
        //return "<img src='/image/Imagick/pingImage'/>";
    }

//    function renderDescription() {
//
//    }

    function renderDescription() {


        echo "This method can be used to query image width, height, size, and format without reading the whole image in to memory.";
        
        $image = new \Imagick();
        $image->pingImage(realpath($this->imagePath));

        echo "Width is " . $image->getImageWidth() . "<br/>";
        echo "Height is " . $image->getImageHeight() . "<br/>";
    }
}