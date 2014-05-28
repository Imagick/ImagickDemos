<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;




class BlackPoint extends ValueElement {

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
        return 'blackPoint';
    }

    protected function getDisplayName() {
        return 'Black point';
    }

    function getBlackPoint() {
        return $this->getValue();
    }
}
