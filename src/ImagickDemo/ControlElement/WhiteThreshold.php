<?php


namespace ImagickDemo\ControlElement;


class WhiteThreshold extends ValueElement {

    function getDefault() {
        return 0.9;
    }
    
    function getMin() {
        return 0;
    }
    
    function getMax() {
        return 1;
    }
    
    function getVariableName() {
        return 'whiteThreshold';
    }
    
    function getDisplayName() {
        return 'White threshold';
    }

    function getWhiteThreshold() {
        return $this->getValue();
    }
}