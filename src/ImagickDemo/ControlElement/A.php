<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


class A extends ValueElement {

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
        return 'a';
    }

    protected function getDisplayName() {
        return 'A';
    }

    function getA() {
        return $this->getValue();
    }
}



 