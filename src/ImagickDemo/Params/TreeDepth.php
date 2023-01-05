<?php

namespace ImagickDemo\Params;


use DataType\ExtractRule\GetIntOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\RangeIntValue;

#[\Attribute]
class TreeDepth implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetIntOrDefault(1),
            new RangeIntValue(0, 16)
        );
    }
}
