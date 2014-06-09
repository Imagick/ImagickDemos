<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class AdaptiveOffset extends ValueElement {

    private $default;
    
    function __construct(Request $request) {
        $this->default = \Imagick::getQuantum() / 8;
        parent::__construct($request);
    }
    
    protected function getDefault() {
        return $this->default;
    }

    protected function filterValue($value) {
        return intval($value);
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return \Imagick::getQuantum();
    }

    protected function getVariableName() {
        return 'adaptiveOffset';
    }

    protected function getDisplayName() {
        return 'Offset';
    }

    function getAdaptiveOffset() {
        return $this->getValue();
    }
}
