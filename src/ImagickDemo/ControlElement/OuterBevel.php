<?php


namespace ImagickDemo\ControlElement;


class OuterBevel extends ValueElement {

    protected function getDefault() {
        return 3;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 50;
    }

    protected function getVariableName() {
        return 'outerBevel';
    }

    protected function getDisplayName() {
        return 'Outer bevel';
    }

    function getOuterBevel() {
        return $this->getValue();
    }
}