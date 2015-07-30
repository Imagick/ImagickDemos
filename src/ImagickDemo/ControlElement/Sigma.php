<?php

namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class Sigma extends ValueElement
{
    private $defaultSigma;

    public function __construct(VariableMap $variableMap, $defaultSigma = 1)
    {
        $this->defaultSigma = $defaultSigma;
        parent::__construct($variableMap);
    }

    protected function getDefault()
    {
        return 1;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 100;
    }

    protected function getVariableName()
    {
        return 'sigma';
    }

    protected function getDisplayName()
    {
        return 'Sigma';
    }

    public function getSigma()
    {
        return $this->getValue();
    }
}
