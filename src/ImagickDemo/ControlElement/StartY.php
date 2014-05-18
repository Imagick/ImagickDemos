<?php


namespace ImagickDemo\ControlElement;


class StartY extends ValueElement {

    protected function getDefault() {
        return 100;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 500;
    }

    protected function getVariableName() {
        return 'startY';
    }

    protected function getDisplayName() {
        return 'Start Y';
    }

    function getStartY() {
        return $this->getValue();
    }
}