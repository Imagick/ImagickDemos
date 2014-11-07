<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class BlackPoint extends ValueElement {

    private $defaultBlackPoint;

    function __construct(Request $request, $defaultBlackPoint = 10) {
        $this->defaultBlackPoint = $defaultBlackPoint;
        parent::__construct($request);
    }
    
    protected function getDefault() {
        return $this->defaultBlackPoint;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 255;
    }

    protected function getVariableName() {
        return 'blackPoint';
    }

    protected function getDisplayName() {
        return 'Black point';
    }

    function getBlackPoint() {
        return $this->getValue();
    }
}
