<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class X extends ValueElement {

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
        return 'x';
    }

    protected function getDisplayName() {
        return 'X';
    }

    function getX() {
        return $this->getValue();
    }
}
