<?php


namespace ImagickDemo\ControlElement;


use Intahwebz\Request;


class Sigma extends ValueElement {

    private $defaultSigma;

    function __construct(Request $request, $defaultSigma = 1) {
        $this->defaultSigma = $defaultSigma;
        parent::__construct($request);
    }

    protected function getDefault() {
        return 1;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 100;
    }

    protected function getVariableName() {
        return 'sigma';
    }

    protected function getDisplayName() {
        return 'Sigma';
    }

    function getSigma() {
        return $this->getValue();
    }
}
