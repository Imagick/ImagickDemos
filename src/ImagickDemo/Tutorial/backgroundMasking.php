<?php

namespace ImagickDemo\Tutorial;

class backgroundMasking extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Background masking";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function getOriginalImage()
    {
        return "/imageOriginal/Tutorial/backgroundMasking";
        
    }
    
    public function getOriginalFilename(): string|null
    {
        return realpath("./images/chair.jpeg");
    }

//    public function renderOriginalImage()
//    {
//        $imagick = new \Imagick();
//        header("Content-Type: image/jpeg");
//        echo $imagick->getImageBlob();
//        return;
//    }


}
