<?php


namespace ImagickDemo\ImagickPixel;

use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {

    function getExamples() {
        $imagePixelExamples = array(
            new NavOption('construct'),
            //'ImagickPixel.clear', 
            new NavOption('getColor'),
            new NavOption('getColorAsString'),
            //No idea    'ImagickPixel.getColorCount',
            new NavOption('getColorValue'),
            new NavOption('getColorValueQuantum'),
            new NavOption('getHSL'),
            new NavOption('isSimilar'),
            new NavOption('setColor'),
            new NavOption('setColorValue'),
            new NavOption('setColorValueQuantum'),
            new NavOption('setHSL'),
        );

        return $imagePixelExamples;
    }


}

 