<?php


namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class AdaptiveOffset extends ValueElement {

    private $default;
    
    function __construct(VariableMap $variableMap) {
        $this->default = 1 / 8;
        parent::__construct($variableMap);
    }
    
    protected function getDefault() {
        return $this->default;
    }

//    protected function filterValue($value) {
//        return intval($value);
//    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 1;
    }

    protected function getVariableName() {
        return 'adaptiveOffset';
    }

    protected function getDisplayName() {
        return 'Offset';
    }

    protected function getHelpText() {
        return "";
    }
    
    function getAdaptiveOffset() {
        return $this->getValue();
    }
}
