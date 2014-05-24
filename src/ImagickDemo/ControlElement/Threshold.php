<?php


namespace ImagickDemo\ControlElement;


class Threshold extends ValueElement {

    function getDefault() {
        return 0;
    }
    
    function getMin() {
        return 0;
    }
    
    function getMax() {
        return 255;
    }
    
    function getVariableName() {
        return 'threshold';
    }
    
    function getDisplayName() {
        return 'Threshold';
    }

    function getThreshold() {
        return $this->getValue();
    }
}