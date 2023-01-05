<?php

namespace ImagickDemo\Params;


use DataType\ExtractRule\GetFloatOrDefault;
use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\RangeFloatValue;

#[\Attribute]
class Radius20 implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetFloatOrDefault(20),
            new RangeFloatValue(0, 100)
        );
    }
}
