<?php

namespace ImagickDemo\Tutorial;

class diffMarking extends \ImagickDemo\Example
{
    public function renderTitle()
    {
        return "Difference marking";
    }

    public function getOriginalImage()
    {
        return false;
    }

//    public function getOriginalFilename()
//    {
//        return realpath("./images/chair.jpeg");
//    }

//    public function renderOriginalImage()
//    {
//        $imagick = new \Imagick();
//        header("Content-Type: image/jpg");
//        echo $imagick->getImageBlob();
//        return;
//    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
