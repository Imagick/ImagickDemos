<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

ComponentRangeInt default of 100

class G extends ValueElement
{
    private $defaultGreen;

    public function __construct(VariableMap $variableMap, $defaultG = 100)
    {
        $this->defaultGreen = $defaultG;
        parent::__construct($variableMap);
    }
    
    protected function filterValue($value)
    {
        return intval($value);
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
