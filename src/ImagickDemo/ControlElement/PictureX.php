<?php

namespace ImagickDemo\ControlElement;

use Room11\HTTP\VariableMap;

class PictureX extends ValueElement
{
    private $defaultX;

    public function __construct(VariableMap $variableMap, $defaultX = 10)
    {
        $this->defaultX = $defaultX;
        parent::__construct($variableMap);
    }
    
    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return $this->defaultX;
    }

    protected function getMin()
    {
        return 0;
    }

    protected function getMax()
    {
        return 1000;
    }

    protected function getVariableName()
    {
        return 'x';
    }

    protected function getDisplayName()
    {
        return 'X';
    }

    public function getX()
    {
        return $this->getValue();
    }
}
