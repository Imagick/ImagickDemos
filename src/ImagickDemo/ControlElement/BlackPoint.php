<?php

namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class BlackPoint extends ValueElement
{
    private $defaultBlackPoint;

    public function __construct(VariableMap $variableMap, $defaultBlackPoint = 10)
    {
        $this->defaultBlackPoint = $defaultBlackPoint;
        parent::__construct($variableMap);
    }

    protected function filterValue($value)
    {
        return floatval($value);
    }
    
    protected function getDefault()
    {
        return $this->defaultBlackPoint;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 255;
    }

    protected function getVariableName()
    {
        return 'blackPoint';
    }

    protected function getDisplayName()
    {
        return 'Black point';
    }

    public function getBlackPoint()
    {
        return $this->getValue();
    }
}
