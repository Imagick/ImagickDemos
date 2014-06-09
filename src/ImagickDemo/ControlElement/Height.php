<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Height extends ValueElement {

    private $default;

    function __construct(Request $request, $defaultHeight = 20) {
        $this->default = $defaultHeight;
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
        return 'height';
    }

    protected function getDisplayName() {
        return 'Height';
    }

    function getHeight() {
        return $this->getValue();
    }
}