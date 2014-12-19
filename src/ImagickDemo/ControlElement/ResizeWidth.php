<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class ResizeWidth extends ValueElement {

    private $default;
    
    function __construct(Request $request, $defaultWidth = 200) {
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
