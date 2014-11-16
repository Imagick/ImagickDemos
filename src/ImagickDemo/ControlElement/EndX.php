<?php


namespace ImagickDemo\ControlElement;


class EndX extends ValueElement {

    protected function getDefault() {
        return 250;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 300;
    }

    protected function getVariableName() {
        return 'endX';
    }

    protected function getDisplayName() {
        return 'End X';
    }

    function getEndX() {
        return $this->getValue();
    }
}