<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class WhiteThreshold extends ValueElement {

    private $default;
    
    function __construct(Request $request, $defaultWhiteThreshold = 0.2) {
        $this->default = $defaultWhiteThreshold;
        parent::__construct($request);
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