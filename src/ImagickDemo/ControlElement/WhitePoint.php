<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


class WhitePoint extends ValueElement {

    private $defaultWhitePoint;

    function __construct(Request $request, $defaultWhitePoint = 10) {
        $this->defaultWhitePoint = $defaultWhitePoint;
        parent::__construct($request);
    }
    
    
    protected function getDefault() {
        return $this->defaultWhitePoint;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 255;
    }

    protected function getVariableName() {
        return 'whitePoint';
    }

    protected function getDisplayName() {
        return 'WhitePoint';
    }

    function getWhitePoint() {
        return $this->getValue();
    }
}