<?php


namespace ImagickDemo\ControlElement;


class OriginX extends ValueElement {

    protected function getDefault() {
        return 250;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 500;
    }

    protected function getVariableName() {
        return 'originX';
    }

    protected function getDisplayName() {
        return 'Origin X';
    }

    function getOriginX() {
        return $this->getValue();
    }
}