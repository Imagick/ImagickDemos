<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetIntOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\MaxIntValue;
use DataType\ProcessRule\MinIntValue;

#[\Attribute]
class R implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetIntOrDefault(200),
            new MinIntValue(0),
            new MaxIntValue(255),
        );
    }
}
