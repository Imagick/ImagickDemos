<?php


namespace ImagickDemo\ImagickPixelIterator;





class syncIterator extends \ImagickDemo\Imagick\ImagickExample {



    function render() {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }


}