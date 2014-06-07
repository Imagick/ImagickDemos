<?php


namespace ImagickDemo\ControlElement;




class Fuzz extends ValueElement {

    protected function getDefault() {
        return 0.01;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 1;
    }

    protected function getVariableName() {
        return 'fuzz';
    }

    protected function getDisplayName() {
        return 'Fuzz';
    }

    function getFuzz() {
        return $this->getValue();
    }
}



 