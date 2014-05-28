<?php


namespace ImagickDemo\ControlElement;



class Midpoint extends ValueElement {

    protected function getDefault() {
        return 4;
    }

    protected function getMin() {
        return -100;
    }

    protected function getMax() {
        return 100;
    }

    protected function getVariableName() {
        return 'midpoint';
    }

    protected function getDisplayName() {
        return 'Midpoint';
    }

    function getMidpoint() {
        return $this->getValue();
    }
}