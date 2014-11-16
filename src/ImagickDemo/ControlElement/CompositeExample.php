<?php


namespace ImagickDemo\ControlElement;


class CompositeExample extends OptionKeyElement {

    function getVariableName() {
        return 'compositeExample';
    }

    function getDefault() {
        return 'screenGradients';
    }

    function getDisplayName() {
        return "Composite example";
    }

    function getOptions() {
        
        return \ImagickDemo\Tutorial\composite::getExamples();

//        return \ImagickDemo\Tutorial\composite::getExamples();
//        $listOfExamples = [
//            'multiplyGradients' => 'Multiply two gradients',
//            'screenGradients' => 'Screen two gradients',
//            'divide' => 'Divide image',
//            'Dst_In' => 'Dst_In',
//            'Dst_Out' => 'Dst_Out',
//            'ATop' => 'ATop',
//            'Plus' => 'Plus',
//            'Minus' => 'Minus',
//            'CopyOpacity' => 'CopyOpacity', //(Set transparency from gray-scale mask)
//            'CopyOpacity2' => 'CopyOpacity2', //(Set transparency from gray-scale mask)
//        ];
//
//        return $listOfExamples;
    }

    function getCompositeExampleType() {
        return $this->getKey();
    }
}

 