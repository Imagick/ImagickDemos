<?php

namespace ImagickDemo\Params;


use DataType\ExtractRule\GetIntOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\MaxIntValue;
use DataType\ProcessRule\MinIntValue;

#[\Attribute]
class SampleFactor implements HasInputType
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
            new GetIntOrDefault($this->default),
            new MinIntValue(1),
            new MaxIntValue(40),
        );
    }
}
