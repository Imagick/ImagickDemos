<?php

namespace ImagickDemo\ControlElement;

use Room11\HTTP\VariableMap;

class WhiteThreshold extends ValueElement
{
    private $default;

    public function __construct(VariableMap $variableMap, $defaultWhiteThreshold = 0.2)
    {
        $this->default = $defaultWhiteThreshold;
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
        return 0;
    }

    protected function getMax()
    {
        return 100;
    }

    protected function getVariableName()
    {
        return 'whiteThreshold';
    }

    protected function getDisplayName()
    {
        return 'White threshold';
    }

    public function getWhiteThreshold()
    {
        return $this->getValue();
    }
}
