<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class BlackThreshold extends ValueElement {

    private $default;
    
    function __construct(Request $request, $defaultBlackThreshold = 0.2) {
        $this->default = $defaultBlackThreshold;
        parent::__construct($request);
    }


    protected function getDefault() {
        return $this->default;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 1;
    }

    protected function getVariableName() {
        return 'blackThreshold';
    }

    protected function getDisplayName() {
        return 'Black threshold';
    }

    function getBlackThreshold() {
        return $this->getValue();
    }
}