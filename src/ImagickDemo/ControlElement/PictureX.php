<?php


namespace ImagickDemo\ControlElement;


use Intahwebz\Request;

class PictureX extends ValueElement {

    private $defaultX;

    function __construct(Request $request, $defaultX = 10) {
        $this->defaultX = $defaultX;
        parent::__construct($request);
    }
    
    
    protected function getDefault() {
        return $this->defaultX;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 1000;
    }

    protected function getVariableName() {
        return 'x';
    }

    protected function getDisplayName() {
        return 'X';
    }

    function getX() {
        return $this->getValue();
    }
}
