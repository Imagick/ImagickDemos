<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetFloatOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\MaxIntValue;
use DataType\ProcessRule\MinIntValue;

#[\Attribute]
class AngleRange implements HasInputType
{
    public function __construct(
        private int $default,
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetFloatOrDefault($this->default),
            new MinIntValue(0),
            new MaxIntValue(360),
        );
    }
}
