<?php


namespace ImagickDemo\ControlElement;


class Height50 extends ValueElement {

    protected function getDefault() {
        return 50;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 1000;
    }

    protected function getVariableName() {
        return 'height';
    }

    protected function getDisplayName() {
        return 'Height';
    }

    function getHeight() {
        return $this->getValue();
    }
}