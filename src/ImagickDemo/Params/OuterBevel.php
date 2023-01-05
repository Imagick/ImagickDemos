<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetFloatOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\MaxIntValue;
use DataType\ProcessRule\MinIntValue;

#[\Attribute]
class OuterBevel implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetFloatOrDefault(3),
            new MinIntValue(0),
            new MaxIntValue(50),
        );
    }
}
