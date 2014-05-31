<?php


namespace ImagickDemo\ControlElement;




class G extends ValueElement {

    protected function getDefault() {
        return 100;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 255;
    }

    protected function getVariableName() {
        return 'g';
    }

    protected function getDisplayName() {
        return 'Green';
    }

    function getG() {
        return $this->getValue();
    }
}

