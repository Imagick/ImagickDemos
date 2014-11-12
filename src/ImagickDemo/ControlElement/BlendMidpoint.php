<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


class BlendMidpoint extends ValueElement {

    private $default;
    
    function __construct(Request $request, $defaultBlendMidpoint = 0.5) {
        $this->default = $defaultBlendMidpoint;
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
        return 'blendMidpoint';
    }

    protected function getDisplayName() {
        return 'Blend midpoint';
    }

    function getBlendMidpoint() {
        return $this->getValue();
    }
}