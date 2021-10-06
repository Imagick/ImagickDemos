<?php

namespace ImagickDemo\Tutorial;

class backgroundMasking extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Background masking";
    }

    public function hasOriginalImage()
    {
        return true;
    }

    public function getOriginalImage()
    {
        return "/imageOriginal/Tutorial/backgroundMasking";
        
    }
    
    public function getOriginalFilename()
    {
        return realpath("./images/chair.jpeg");
    }

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
