<?php


namespace ImagickDemo\ControlElement;


class BlueShift extends ValueElement {

    function getDefault() {
        return 1.5;
    }
    
    function getMin() {
        return 0;
    }
    
    function getMax() {
        return 255;
    }
    
    function getVariableName() {
        return 'blueShift';
    }
    
    function getDisplayName() {
        return 'Blueshift';
    }

    function getBlueShift() {
        return $this->getValue();
    }
}