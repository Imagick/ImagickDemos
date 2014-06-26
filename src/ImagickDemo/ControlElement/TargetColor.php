<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class TargetColor extends ColorElement {

    private $defaultTargetColor; 
    
    function __construct(Request $request, $defaultTargetColor = 'rgb(127, 0, 127)') {
        $this->defaultTargetColor = $defaultTargetColor;
        parent::__construct($request);
    }
    
    protected function getDefault() {
        return $this->defaultTargetColor;
    }

    protected function getVariableName() {
        return 'targetColor';
    }

    protected function getDisplayName() {
        return 'Target color';
    }

    function getTargetColor() {
        return $this->getValue();
    }
}