<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetFloatOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\MaxFloatValue;
use DataType\ProcessRule\MinFloatValue;

#[\Attribute]
class UnitRange implements HasInputType
{
    public function __construct(
        private float $default,
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetFloatOrDefault($this->default),
            new MinFloatValue(0),
            new MaxFloatValue(1),
        );
    }
}
