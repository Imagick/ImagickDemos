<?php


namespace ImagickDemo\ControlElement;




class Radius extends ValueElement {

    protected function getDefault() {
        return 5;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 10;
    }

    protected function getVariableName() {
        return 'radius';
    }

    protected function getDisplayName() {
        return 'Radius';
    }

    function getRadius() {
        return $this->getValue();
    }
}