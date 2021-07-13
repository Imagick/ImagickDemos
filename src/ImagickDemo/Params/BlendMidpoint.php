<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

// This is a UnitRange with default 0.5

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxFloatValue;
use Params\ProcessRule\MinFloatValue;

// This is a UnitRange with default 0.5
// This is a UnitRange with default 0.5
// This is a UnitRange with default 0.5
// This is a UnitRange with default 0.5
// This is a UnitRange with default 0.5

class BlendMidpoint extends ValueElement
{
    private $default;

    public function __construct(VariableMap $variableMap, $defaultBlendMidpoint = 0.5)
    {
        $this->default = $defaultBlendMidpoint;
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
        return 'blendMidpoint';
    }

    protected function getDisplayName()
    {
        return 'Blend midpoint';
    }

    public function getBlendMidpoint()
    {
        return $this->getValue();
    }
}
