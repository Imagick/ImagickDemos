<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetIntOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\RangeIntValue;

#[\Attribute]
class LoopTime implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetIntOrDefault(160),
            new RangeIntValue(0, 1024)
        );
    }
}
