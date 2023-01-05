<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetIntOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\RangeIntValue;

#[\Attribute]
class PositiveInt implements HasInputType
{
    public function __construct(
        private int $default,
        private int $max,
        private string $name,
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetIntOrDefault($this->default),
            new RangeIntValue(1, $this->max)
        );
    }
}
