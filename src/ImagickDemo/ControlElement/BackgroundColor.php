<?php


namespace ImagickDemo\ControlElement;


class BackgroundColor extends ColorElement {

    protected function getDefault() {
        return 'rgb(225, 225, 225)';
    }

    protected function getVariableName() {
        return 'backgroundColor';
    }

    protected function getDisplayName() {
        return 'Background color';
    }

    function getBackgroundColor() {
        return $this->getValue();
    }
}