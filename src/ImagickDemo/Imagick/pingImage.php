<?php

namespace ImagickDemo\Imagick;


class pingImage extends ImagickExample {

    function renderImageURL() {
        return "";
    }

    function renderDescription() {
        echo "This method can be used to query image width, height, size, and format without reading the whole image in to memory.";
        
        $image = new \Imagick();
        $image->pingImage(realpath($this->imagePath));
        
        
        echo "For file: ".basename($this->imagePath)." <br/>";
        

        echo "Width is " . $image->getImageWidth() . "<br/>";
        echo "Height is " . $image->getImageHeight() . "<br/>";
    }
}