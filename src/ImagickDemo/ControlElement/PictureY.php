<?php


namespace ImagickDemo\ControlElement;


use ImagickDemo\Framework\VariableMap;

class PictureY extends ValueElement {

    private $defaultY;

    function __construct(VariableMap $variableMap, $defaultY = 10) {
        $this->defaultY = $defaultY;
        parent::__construct($variableMap);
    }


    protected function getDefault() {
        return $this->defaultY;
    }


    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 1000;
    }

    protected function getVariableName() {
        return 'y';
    }

    protected function getDisplayName() {
        return 'Y';
    }

    function getY() {
        return $this->getValue();
    }
}