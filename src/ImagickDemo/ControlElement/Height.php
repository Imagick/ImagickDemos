<?php

namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class Height extends ValueElement
{
    private $default;

    public function __construct(VariableMap $variableMap, $defaultHeight = 20)
    {
        $this->default = $defaultHeight;
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
        return 'height';
    }

    protected function getDisplayName()
    {
        return 'Height';
    }

    protected function filterValue($value)
    {
        return intval($value);
    }
    
    public function getHeight()
    {
        return $this->getValue();
    }
}
