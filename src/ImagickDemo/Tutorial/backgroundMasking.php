<?php

namespace ImagickDemo\Tutorial;

class backgroundMasking extends \ImagickDemo\Example
{
    public function renderTitle()
    {
        return "Background masking";
    }

    public function getOriginalImage()
    {
        //return $this->control->getCustomImageURL(['original' => true]);
        
        //return $this->control->getOriginalURL();
        
        return "/imageOriginal/Tutorial/backgroundMasking";
        
    }
    
    public function getOriginalFilename()
    {
        return realpath("./images/chair.jpeg");
    }

    public function renderOriginalImage()
    {
        $imagick = new \Imagick();
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
        return;
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
