<?php


namespace ImagickDemo\Imagick;

trait OriginalImageFile
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function renderOriginalImage()
    {
        return \ImagickDemo\Imagick\renderFile($this->control->getImagePath());
    }
    
    function getOriginalFilename()
    {
        return $this->control->getImagePath();
    }
}
