<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetFloatOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\RangeFloatValue;

#[\Attribute]
class Radius implements HasInputType
{
    public function __construct(
        private float $default,
        private string $name,
        private float $max = 10
    ) {
    }

    public function getInputType(): InputType
    {
        return new InputType(
            $this->name,
            new GetFloatOrDefault($this->default),
            new RangeFloatValue(0, $this->max)
        );
    }
}
