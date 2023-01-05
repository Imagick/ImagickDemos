<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetFloatOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\MaxFloatValue;
use DataType\ProcessRule\MinFloatValue;

#[\Attribute]
class Contrast implements HasInputType
{
    public function __construct(
        private float $default, // default was -20
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetFloatOrDefault($this->default),
            new MinFloatValue(-100),
            new MaxFloatValue(100),
        );
    }
}
