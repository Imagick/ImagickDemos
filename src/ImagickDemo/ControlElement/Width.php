<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Width extends ValueElement {

    private $default;
    
    function __construct(Request $request, $defaultWidth = 50) {
        $this->default = $defaultWidth;


        parent::__construct($request);
    }
    
    protected function getDefault() {
        return $this->default;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 500;
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
