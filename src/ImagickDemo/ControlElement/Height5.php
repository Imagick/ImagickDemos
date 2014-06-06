<?php


namespace ImagickDemo\ControlElement;


class Height5 extends ValueElement {

    protected function getDefault() {
        return 5;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 100;
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