<?php


namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class ReplacementColor extends ColorElement {

    private $defaultColor = 'rgb(0, 0, 0)';
    
    function __construct(VariableMap $variableMap, $defaultReplacementColor = 'rgb(0, 0, 0)') {
        $this->defaultColor = $defaultReplacementColor;
        parent::__construct($variableMap);
    }
    
    protected function getDefault() {
        return $this->defaultColor;
    }

    protected function getVariableName() {
        return 'replacementColor';
    }

    protected function getDisplayName() {
        return 'Replace color';
    }

    function getReplacementColor() {
        return $this->getValue();
    }
}