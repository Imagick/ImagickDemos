<?php


namespace ImagickDemo\ControlElement;



class Y extends ValueElement {

    protected function getDefault() {
        return 10;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 255;
    }

    protected function getVariableName() {
        return 'y';
    }

    protected function getDisplayName() {
        return 'Y';
    }

    function getY() {
        return $this->getValue();
    }
}