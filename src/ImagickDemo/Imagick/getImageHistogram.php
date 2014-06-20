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
//        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
//        $imagick->adaptiveResizeImage(200, 200, true);
//        $histo = $imagick->getImageHistogram();
//        $count = 0;
//        
//        echo "There are ".count($histo)." items in the histogram";
//       
//        foreach ($histo as $histoThingy) {
//
//            if ($histoThingy->getcolorcount() != 1) {
//                echo "color count " . $histoThingy->getcolorcount();
//                //echo " ".$histoThingy->getColorValueQuantum(\Imagick::COLOR_BLUE);
//                echo " ".$histoThingy->getColorValue(\Imagick::COLOR_BLUE);
//                //echo " ".$histoThingy->getcolorasstring();
//                echo "<br/>";
//
//                $count++;
//            }
//            
//            
//            if ($count > 5) {
//                break;
//            }
//        }
       

        return $output;
    }
    
    function render() {
        $output = $this->renderDescription();


        $output .= "<br/>This is the histogram:<br/>";
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