<?php


namespace ImagickDemo\Example;

use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {

    function getExamples() {
        $imagickExamples = [
            new NavOption('edgeExtend', true),
            new NavOption('gradientReflection',  true),
            new NavOption('psychedelicFont', true),
            new NavOption('psychedelicFontGif', true),
            new NavOption('imagickComposite', true),
            new NavOption('imagickCompositeGen', true),
            new NavOption('fxAnalyzeImage', true),
            new NavOption('listColors', true),
            new NavOption('composite', true),
        ];

        return $imagickExamples;
    }
}

 