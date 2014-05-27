<?php


namespace ImagickDemo\ControlElement;


class GradientEndColor extends ColorElement {

    protected function getDefault() {
        return 'white';
    }

    protected function getVariableName() {
        return 'gradientEndColor';
    }

    protected function getDisplayName() {
        return 'Gradient end';
    }

    function getGradientEndColor() {
        return $this->getValue();
    }
}