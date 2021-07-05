<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;


UnitRange with default 0.1

class Fuzz extends ValueElement
{
    private $defaultFuzz;

    public function __construct(VariableMap $variableMap, $defaultFuzz = 0.1)
    {
        $this->defaultFuzz = $defaultFuzz;
        parent::__construct($variableMap);
    }
    
    protected function filterValue($value)
    {
        return floatval($value);
    }

    protected function getDefault()
    {
        return $this->defaultFuzz;
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
        return 'fuzz';
    }

    protected function getDisplayName()
    {
        return 'Fuzz';
    }

    public function getFuzz()
    {
        return $this->getValue();
    }
}
