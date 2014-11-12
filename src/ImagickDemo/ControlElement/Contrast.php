<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Contrast extends ValueElement {


    private $default;

    function __construct(Request $request, $defaultContrast = -20) {
        $this->default = $defaultContrast;
        parent::__construct($request);
    }
    
    protected function getDefault() {
        return $this->default;
    }

    protected function getMin() {
        return -100;
    }

    protected function getMax() {
        return 100;
    }

    protected function getVariableName() {
        return 'contrast';
    }

    protected function getDisplayName() {
        return 'Contrast';
    }

    function getContrast() {
        return $this->getValue();
    }
}