<?php

namespace ImagickDemo\Imagick;

class transparentPaintImage extends \ImagickDemo\Example
{
    public function getOriginalImage()
    {
        return $this->control->getURL() . '&original=true';
    }

//    public function renderOriginalImage()
//    {
//        return \ImagickDemo\Imagick\renderFile(realpath("images/BlueScreen.jpg"));
//    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
