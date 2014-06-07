<?php


namespace ImagickDemo\ControlElement;




class ShearY extends ValueElement {

    protected function getDefault() {
        return 5;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 255;
    }

    protected function getVariableName() {
        return 'shearY';
    }

    protected function getDisplayName() {
        return 'Shear Y';
    }

    function getShearY() {
        return $this->getValue();
    }
}



 