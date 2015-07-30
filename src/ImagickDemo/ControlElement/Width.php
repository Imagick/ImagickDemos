<?php

namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

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
        return 0;
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

    public function getWidth()
    {
        return $this->getValue();
    }
}
