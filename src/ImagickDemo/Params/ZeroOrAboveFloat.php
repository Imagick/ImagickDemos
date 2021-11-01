<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class ZeroOrAboveFloat implements Param
{
    public function __construct(
        private float $default,
        private float $max,
        private string $name,
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault($this->default),
            new RangeFloatValue(0, $this->max)
        );
    }
}
