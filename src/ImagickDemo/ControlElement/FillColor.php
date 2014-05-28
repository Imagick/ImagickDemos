<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;



class FillColor extends ColorElement {

    protected function getDefault() {
        return 'DodgerBlue2';
    }

    protected function getVariableName() {
        return 'fillColor';
    }

    protected function getDisplayName() {
        return 'Fill color';
    }

    function getFillColor() {
        return $this->getValue();
    }
}