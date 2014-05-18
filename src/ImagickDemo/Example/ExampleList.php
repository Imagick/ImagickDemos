<?php


namespace ImagickDemo\Example;

use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {

    function getExamples() {
        $imagickExamples = [
            new NavOption('edgeExtend'),
            new NavOption('gradientReflection'),
            new NavOption('psychedelicFont'),
            new NavOption('psychedelicFontGif'),
            new NavOption('imagickComposite'),
            new NavOption('imagickCompositeGen'),
            new NavOption('fxAnalyzeImage'),
            new NavOption('listColors'),
            new NavOption('composite'),
        ];

        return $imagickExamples;
    }
}

 