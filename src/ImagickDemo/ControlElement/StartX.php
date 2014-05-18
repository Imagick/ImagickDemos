<?php


namespace ImagickDemo\ControlElement;


class StartX extends ValueElement {

    protected function getDefault() {
        return 100;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 500;
    }

    protected function getVariableName() {
        return 'startX';
    }

    protected function getDisplayName() {
        return 'Start X';
    }

    function getStartX() {
        return $this->getValue();
    }
}