<?php


namespace ImagickDemo\ControlElement;


class Contrast extends ValueElement {

    protected function getDefault() {
        return -20;
    }

    protected function getMin() {
        return -100;
    }

    protected function getMax() {
        return 100;
    }

    protected function getVariableName() {
        return 'contrast';
    }

    protected function getDisplayName() {
        return 'Contrast';
    }

    function getContrast() {
        return $this->getValue();
    }
}