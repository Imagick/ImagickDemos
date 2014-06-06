<?php


namespace ImagickDemo\ControlElement;




class Gamma extends ValueElement {

    protected function getDefault() {
        return 2.2;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 10;
    }

    protected function getVariableName() {
        return 'gamma';
    }

    protected function getDisplayName() {
        return 'Gamma';
    }

    function getGamma() {
        return $this->getValue();
    }
}



 