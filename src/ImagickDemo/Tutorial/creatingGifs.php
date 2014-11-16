<?php


namespace ImagickDemo\Tutorial;


use Imagick;


class creatingGifs extends \ImagickDemo\Example {


    function renderDescription() {
        return '';
    }

    function render() {
        return $this->renderImageURL();
    }

    /**
     * 
     */
    function renderCustomImage() {
        $imagick = new \Imagick();
        $imagick->setcolorspace(\Imagick::COLORSPACE_GRAY);
        $imagick->newPseudoImage(10, 256, 'gradient:black-white');
        $imagick->evaluateimage(\Imagick::EVALUATE_POW, 0.5);
        analyzeImage($imagick);
    }
}

 