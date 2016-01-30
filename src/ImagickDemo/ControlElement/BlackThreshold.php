<?php

namespace ImagickDemo\ControlElement;

use Room11\HTTP\VariableMap;

class BlackThreshold extends ValueElement
{
    private $default;

    public function __construct(VariableMap $variableMap, $defaultBlackThreshold = 0.2)
    {
        $this->default = $defaultBlackThreshold;
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
        return 1;
    }

    protected function getVariableName()
    {
        return 'blackThreshold';
    }

    protected function getDisplayName()
    {
        return 'Black threshold';
    }

    public function getBlackThreshold()
    {
        return $this->getValue();
    }
}
