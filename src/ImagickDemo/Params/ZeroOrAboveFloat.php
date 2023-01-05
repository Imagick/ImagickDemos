<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetFloatOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\RangeFloatValue;

#[\Attribute]
class ZeroOrAboveFloat implements HasInputType
{
    public function __construct(
        private float $default,
        private float $max,
        private string $name,
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
