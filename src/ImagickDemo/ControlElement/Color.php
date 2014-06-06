<?php


namespace ImagickDemo\ControlElement;


class Color extends ColorElement {

    protected function getDefault() {
        return 'rgb(127, 127, 127)';
    }

    protected function getVariableName() {
        return 'color';
    }

    protected function getDisplayName() {
        return 'Color';
    }

    function getColor() {
        return $this->getValue();
    }
}