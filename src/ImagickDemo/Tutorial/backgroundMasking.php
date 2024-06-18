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
        return "/images/chair.jpeg";
    }
}
