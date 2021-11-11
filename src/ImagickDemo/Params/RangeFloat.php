<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxFloatValue;
use Params\ProcessRule\MinFloatValue;

#[\Attribute]
class RangeFloat implements Param
{
    public function __construct(
        private float $min,
        private float $max,
        private float $default,
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault($this->default),
            new MinFloatValue($this->min),
            new MaxFloatValue($this->max),
        );
    }
}
