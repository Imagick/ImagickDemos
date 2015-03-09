<?php


namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class Color extends ColorElement {

    private $defaultColor; 
    
    function __construct(VariableMap $variableMap, $defaultColor = 'rgb(127, 127, 127)') {
        $this->defaultColor = $defaultColor;
        parent::__construct($variableMap);
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