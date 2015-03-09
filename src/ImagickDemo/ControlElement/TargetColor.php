<?php


namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class TargetColor extends ColorElement {

    private $defaultTargetColor; 
    
    function __construct(VariableMap $variableMap, $defaultTargetColor = 'rgb(127, 0, 127)') {
        $this->defaultTargetColor = $defaultTargetColor;
        parent::__construct($variableMap);
    }
    
    protected function getDefault() {
        return $this->defaultTargetColor;
    }

    protected function getVariableName() {
        return 'targetColor';
    }

    protected function getDisplayName() {
        return 'Target color';
    }

    function getTargetColor() {
        return $this->getValue();
    }
}