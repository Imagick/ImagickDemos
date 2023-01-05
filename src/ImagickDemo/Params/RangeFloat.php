<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetFloatOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\MaxFloatValue;
use DataType\ProcessRule\MinFloatValue;

#[\Attribute]
class RangeFloat implements HasInputType
{
    public function __construct(
        private float $min,
        private float $max,
        private float $default,
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetFloatOrDefault($this->default),
            new MinFloatValue($this->min),
            new MaxFloatValue($this->max),
        );
    }
}
