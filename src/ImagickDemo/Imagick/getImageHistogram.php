<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Control\ImageControl;

class getImageHistogram extends  \ImagickDemo\Example {

    protected $imagePath;
    
    private $imageControl;
    
    function __construct(ImageControl $imageControl) {
        $this->imageControl = $imageControl;
    }

    function getControl() {
        return $this->imageControl;
    }

    function renderDescription() {
        $output =  "Histogram generation<br/>";
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        $imagick->adaptiveResizeImage(200, 200, true);
        $histo = $imagick->getImageHistogram();
        $count = 0;
       
        foreach ($histo as $histoThingy) {
            var_dump($histoThingy);
            $count++;
            if ($count > 5) {
                break;
            }
        }
       

        return $output;
    }
    
    function render() {
        $output = $this->renderDescription();
        $output .= sprintf("<img src='%s' />", $this->imageControl->getCustomImageURL());

        return $output;
    }

    function renderCustomImage() {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));

        header( "Content-Type: image/jpeg" );
        echo $imagick;

//        var_dump($imagick->getImageHistogram());
    }
        
    function renderasdasd() {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        $imagick->adaptiveResizeImage(200, 200, true);
        var_dump($imagick->getImageHistogram());
    }

    function renderImage() {

       

    }
}