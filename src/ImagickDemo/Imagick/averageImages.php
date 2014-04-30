<?php

namespace ImagickDemo\Imagick;


class averageImages extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/averageImages'/>";
    }

    function renderDescription() {

    }

    function renderImage() {

        
        
        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

        $imagick2 = new \Imagick(realpath("../images/TestImage2.jpg"));

        $imagick->addImage($imagick2);

//This kills PHP  - but the function is deprecated.
        $averageImage = $imagick->averageImages();

        $averageImage->setImageType('jpg');
        header("Content-Type: image/jpg");
        echo $averageImage->getImageBlob();


    }

}