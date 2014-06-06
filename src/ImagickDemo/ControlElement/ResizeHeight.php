<?php


namespace ImagickDemo\ControlElement;


class ResizeHeight extends ValueElement {

    function getDefault() {
        return 200;
    }
    
    function getMin() {
        return 0;
    }
    
    function getMax() {
        return 1000;
    }
    
    function getVariableName() {
        return 'resizeHeight';
    }
    
    function getDisplayName() {
        return 'Height';
    }

    function getHeight() {
        return $this->getValue();
    }
}