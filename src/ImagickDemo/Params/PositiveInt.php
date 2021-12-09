<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class PositiveInt implements Param
{
    public function __construct(
        private int $default,
        private int $max,
        private string $name,
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault($this->default),
            new RangeIntValue(1, $this->max)
        );
    }
}