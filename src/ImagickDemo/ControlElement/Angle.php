<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


class Angle extends ValueElement {

    protected function getDefault() {
        return 45;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 360;
    }

    protected function getVariableName() {
        return 'angle';
    }

    protected function getDisplayName() {
        return 'Angle';
    }

    function getAngle() {
        return $this->getValue();
    }
}
