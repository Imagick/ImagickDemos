<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Color extends ColorElement {

    private $defaultColor; 
    
    function __construct(Request $request, $defaultColor = 'rgb(127, 127, 127)') {
        $this->defaultColor = $defaultColor;
        parent::__construct($request);
    }
    
    protected function getDefault() {
        return $this->defaultColor;
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