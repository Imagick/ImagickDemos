<?php

namespace ImagickDemo\Params;


use DataType\ExtractRule\GetIntOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\MaxIntValue;
use DataType\ProcessRule\MinIntValue;

#[\Attribute]
class Amount implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetIntOrDefault(5),
            new MinIntValue(0),
            new MaxIntValue(20),
        );
    }
}
