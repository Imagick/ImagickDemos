<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Control\ImageControl;

class getImageHistogram extends \ImagickDemo\Example {

    protected $imagePath;
    
    private $imageControl;
    
    function __construct(ImageControl $imageControl) {
        $this->imageControl = $imageControl;
    }

    function getCustomImageParams() {
        return $this->imageControl->getParams();
    }

    function getControl() {
        return $this->imageControl;
    }

    function render() {
        $output = "This is the histogram:<br/>";
        $output .= sprintf("<img src='%s' />", $this->imageControl->getURL());
        $output .= "<br/>For this image:<br/>";
        $output .= sprintf("<img src='%s' />", $this->imageControl->getCustomImageURL());
        
        return $output;
    }

    function renderCustomImage() {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        header("Content-Type: image/jpg");
        echo $imagick;
    }

    function renderImage() {
    }
}