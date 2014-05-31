<?php


namespace ImagickDemo\ControlElement;





class StrokeColor extends ColorElement {

    protected function getDefault() {
        return 'rgb(0, 0, 0)';
    }

    protected function getVariableName() {
        return 'strokeColor';
    }

    protected function getDisplayName() {
        return 'Stroke color';
    }

    function getStrokeColor() {
        return $this->getValue();
    }
}