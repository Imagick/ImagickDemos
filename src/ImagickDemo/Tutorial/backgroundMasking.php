<?php


namespace ImagickDemo\Tutorial;


class backgroundMasking extends \ImagickDemo\Example {

    function renderTitle() {
        return "Background masking";
    }
    
    function getOriginalImage() {
        return $this->control->getCustomImageURL(['original' => true]);
    }

    function renderOriginalImage()
    {
        $imagick = new \Imagick(realpath("./images/chair.jpeg"));
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
        return;
    }
    
    function render() {
        return $this->renderImageURL();
    }
}