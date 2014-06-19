<?php


namespace ImagickDemo\ControlElement;


use Intahwebz\Request;


class Fuzz extends ValueElement {


    private $defaultFuzz;

    function __construct(Request $request, $defaultFuzz = 0.1) {
        $this->defaultFuzz = $defaultFuzz;
        parent::__construct($request);
    }
    
    
    protected function getDefault() {
        return $this->defaultFuzz;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 1;
    }

    protected function getVariableName() {
        return 'fuzz';
    }

    protected function getDisplayName() {
        return 'Fuzz';
    }

    function getFuzz() {
        return $this->getValue();
    }
}



 