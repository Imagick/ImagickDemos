<?php


namespace ImagickDemo\Example;

use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {

    function getExamples() {
        $imagickExamples = [
            new NavOption('edgeExtend'),
            new NavOption('compressImages'),
            new NavOption('gradientReflection'),
            new NavOption('psychedelicFont'),
            new NavOption('psychedelicFontGif'),
            new NavOption('imagickComposite'),
            new NavOption('imagickCompositeGen'),
            new NavOption('fxAnalyzeImage'),
            new NavOption('listColors'),
            //new NavOption('svgExample'),
            new NavOption('composite'),
            new NavOption('svgExample'),
            new NavOption('screenEmbed'),
            new NavOption('gradientGeneration'),
            
        ];

        return $imagickExamples;
    }
}

 