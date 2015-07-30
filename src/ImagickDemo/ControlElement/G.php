<?php

namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;

class G extends ValueElement
{
    private $defaultGreen;

    public function __construct(VariableMap $variableMap, $defaultG = 100)
    {
        $this->defaultGreen = $defaultG;
        parent::__construct($variableMap);
    }

    protected function getDefault()
    {
        return $this->defaultGreen;
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
        return 'g';
    }

    protected function getDisplayName()
    {
        return 'Green';
    }

    public function getG()
    {
        return $this->getValue();
    }
}
