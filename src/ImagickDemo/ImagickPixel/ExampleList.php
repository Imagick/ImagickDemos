<?php


namespace ImagickDemo\ImagickPixel;

use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {

    function getExamples() {
        $imagePixelExamples = array(
            new NavOption('construct', true),
            //'ImagickPixel.clear', 
            new NavOption('getColor',  false),
            new NavOption('getColorAsString', false),
            //No idea    'ImagickPixel.getColorCount',
            new NavOption('getColorValue', false),
            new NavOption('getColorValueQuantum', false),
            new NavOption('getHSL', false),
            new NavOption('isSimilar', false),
            new NavOption('setColor', true),
            new NavOption('setColorValue', true),
            new NavOption('setColorValueQuantum', true),
            new NavOption('setHSL', false),
        );

        return $imagePixelExamples;
    }


}

 