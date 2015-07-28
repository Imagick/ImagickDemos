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
        return $this->control->getCustomImageURL(['original' => true]);
    }

    public function renderOriginalImage()
    {
        $imagick = new \Imagick(realpath("./images/chair.jpeg"));
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
        return;
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
