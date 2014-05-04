<?php

namespace ImagickDemo\Imagick;


class averageImages extends \ImagickDemo\Example {

    
    function __construct() {
        echo "Needs two images";
        exit(0);
    }
    
    function renderImageURL() {
        return "<img src='/image/Imagick/averageImages'/>";
    }

    function renderDescription() {
        return "Function is deprecated, and kills PHP. I suggest not using it.";
    }

    function renderImage() {

        try {
        
        $imagick = new \Imagick(realpath($this->imagePath));
        //$imagick2 = new \Imagick(realpath("../images/TestImage2.jpg"));

        //$imagick->addImage($imagick2);

        //This kills PHP  - but the function is deprecated.
        $averageImage = @$imagick->averageImages();

        $averageImage->setImageType('jpg');
        header("Content-Type: image/jpg");
        echo $averageImage->getImageBlob();
            
        }
        catch (\Exception $e) {
            echo "arrgh ".$e->getMessage();
        }
    }

}