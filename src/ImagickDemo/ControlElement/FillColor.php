<?php


namespace ImagickDemo\ControlElement;


use Intahwebz\Request;


class FillColor extends ColorElement {

    private $defaultColor;

    function __construct(Request $request, $defaultFillColor = 'DodgerBlue2') {
        $this->defaultColor = $defaultFillColor;
        parent::__construct($request);
    }

    protected function getDefault() {
        return $this->defaultColor;
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