<?php

namespace ImagickDemo\Imagick;

class adaptiveBlurImage extends \ImagickDemo\Example {

//
//    private $params = [
//        'radius' => 'The radius of the Gaussian, in pixels, not counting the center pixel.
//	 * Provide a value of 0 and the radius will be chosen automagically.',
//        'sigma' => 'The standard deviation of the Gaussian, in pixels.', 
//        'channel' => 'Provide any channel constant that is valid for your channel mode. To apply to more than one channel, combine channel constants using bitwise operators. Defaults to <b>Imagick::CHANNEL_DEFAULT</b>. Refer to this list of channel constants' 
//    ];
//
//    private $description = "Adds adaptive blur filter to image.";
    
    function renderTitle() {
        return "Adaptive blur image";
    }

    function render() {
        $output = "";
        $output .= $this->renderImageURL();
        return $output;
    }

    function renderDoc() {

    }
}