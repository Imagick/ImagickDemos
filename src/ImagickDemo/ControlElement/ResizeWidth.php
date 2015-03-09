<?php


namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class ResizeWidth extends ValueElement {

    private $default;
    
    function __construct(VariableMap $variableMap, $defaultWidth = 200) {
        $this->default = $defaultWidth;

        parent::__construct($variableMap);
    }
    
    protected function getDefault() {
        return $this->default;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 800;
    }

    protected function getVariableName() {
        return 'width';
    }

    protected function getDisplayName() {
        return 'Width';
    }

    function getWidth() {
        return $this->getValue();
    }
}
