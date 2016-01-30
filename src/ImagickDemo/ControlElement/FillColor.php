<?php

namespace ImagickDemo\ControlElement;

use Room11\HTTP\VariableMap;

class FillColor extends ColorElement
{
    private $defaultColor;

    public function __construct(VariableMap $variableMap, $defaultFillColor = 'DodgerBlue2')
    {
        $this->defaultColor = $defaultFillColor;
        parent::__construct($variableMap);
    }

    protected function getDefault()
    {
        return $this->defaultColor;
    }

    protected function getVariableName()
    {
        return 'fillColor';
    }

    protected function getDisplayName()
    {
        return 'Fill color';
    }

    public function getFillColor()
    {
        return $this->getValue();
    }
}
