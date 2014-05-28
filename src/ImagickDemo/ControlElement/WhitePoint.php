<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class WhitePoint extends ValueElement {

    protected function getDefault() {
        return 200;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 255;
    }

    protected function getVariableName() {
        return 'whitePoint';
    }

    protected function getDisplayName() {
        return 'WhitePoint';
    }

    function getWhitePoint() {
        return $this->getValue();
    }
}