<?php


namespace ImagickDemo\ControlElement;


class Height extends ValueElement {

    function getDefault() {
        return 5;
    }
    
    function getMin() {
        return 0;
    }
    
    function getMax() {
        return 20;
    }
    
    function getVariableName() {
        return 'height';
    }
    
    function getDisplayName() {
        return 'Height';
    }

    function getHeight() {
        return $this->getValue();
    }
}