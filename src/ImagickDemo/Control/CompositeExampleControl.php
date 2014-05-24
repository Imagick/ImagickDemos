<?php


namespace ImagickDemo\Control;


class CompositeExampleControl extends OptionControl {

    function getName() {
        return 'compositeType';
    }

    function getDefaultOption() {
        return 'screenGradients';
    }

    function getOptions() {
        $listOfExamples = [
            'multiplyGradients' => 'Multiply two gradients',
            'screenGradients' => 'Screen two gradients',
            'divide' => 'Divide image',
            'Dst_In' => 'Dst_In',
            'Dst_Out' => 'Dst_Out',
            'ATop' => 'ATop',
            'Plus' => 'Plus',
            'Minus' => 'Minus',
            'CopyOpacity' => 'CopyOpacity', //(Set transparency from gray-scale mask)
            'CopyOpacity2' => 'CopyOpacity2', //(Set transparency from gray-scale mask)
        ];

        return $listOfExamples;
    }

    function getCompositeExampleType() {
        return $this->getOptionValue();
    }
}

 