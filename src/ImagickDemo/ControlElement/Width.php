<?php

namespace ImagickDemo\ControlElement;

use Room11\HTTP\VariableMap;

class Width extends ValueElement
{
    private $default;

    public function __construct(VariableMap $variableMap, $defaultWidth = 50)
    {
        $this->default = $defaultWidth;

        parent::__construct($variableMap);
    }

    protected function getDefault()
    {
        return $this->default;
    }

    protected function getMin()
    {
        return 1;
    }

    protected function getMax()
    {
        return 500;
    }

    protected function getVariableName()
    {
        return 'width';
    }

    protected function getDisplayName()
    {
        return 'Width';
    }
    
    protected function filterValue($value)
    {
        return intval($value);
    }

    public function getWidth()
    {
        return $this->getValue();
    }
}
