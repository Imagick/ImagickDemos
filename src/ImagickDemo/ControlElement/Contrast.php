<?php

namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class Contrast extends ValueElement
{
    private $default;

    public function __construct(VariableMap $variableMap, $defaultContrast = -20)
    {
        $this->default = $defaultContrast;
        parent::__construct($variableMap);
    }

    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return $this->default;
    }

    protected function getMin()
    {
        return -100;
    }

    protected function getMax()
    {
        return 100;
    }

    protected function getVariableName()
    {
        return 'contrast';
    }

    protected function getDisplayName()
    {
        return 'Contrast';
    }

    public function getContrast()
    {
        return $this->getValue();
    }
}
