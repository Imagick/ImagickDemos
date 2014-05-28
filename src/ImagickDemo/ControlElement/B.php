<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


class B extends ValueElement {

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
        return 'b';
    }

    protected function getDisplayName() {
        return 'B';
    }

    function getB() {
        return $this->getValue();
    }
}
 