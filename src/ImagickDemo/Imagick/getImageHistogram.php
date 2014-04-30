<?php

namespace ImagickDemo\Imagick;


class getImageHistogram extends \ImagickDemo\Example {

    function renderImageURL() {
        return "";
    }

    function renderDescription() {
        $imagick = new \Imagick(realpath($this->imagePath));


        $imagick->adaptiveResizeImage(200, 200, true);
        
//Requires more than 16MB memory

//echo "Width is ".$image->getImageWidth()."<br/>";
//echo "Height is ".$image->getImageHeight()."<br/>";

//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();

        var_dump($imagick->getImageHistogram());
    }

    function renderImage() {

       

    }
}