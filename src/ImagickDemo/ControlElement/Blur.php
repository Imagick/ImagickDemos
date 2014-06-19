<?php


namespace ImagickDemo\ControlElement;



class Blur extends ValueElement {

    protected function getDefault() {
        return 1;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 50;
    }

    protected function getVariableName() {
        return 'blur';
    }

    protected function getDisplayName() {
        return 'Blur';
    }

    function getBlur() {
        return $this->getValue();
    }
}
