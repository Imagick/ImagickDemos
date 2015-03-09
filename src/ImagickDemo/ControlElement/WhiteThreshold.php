<?php


namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class WhiteThreshold extends ValueElement {

    private $default;
    
    function __construct(VariableMap $variableMap, $defaultWhiteThreshold = 0.2) {
        $this->default = $defaultWhiteThreshold;
        parent::__construct($variableMap);
    }

    protected function getDefault() {
        return $this->default;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 100;
    }

    protected function getVariableName() {
        return 'whiteThreshold';
    }

    protected function getDisplayName() {
        return 'White threshold';
    }

    function getWhiteThreshold() {
        return $this->getValue();
    }
}