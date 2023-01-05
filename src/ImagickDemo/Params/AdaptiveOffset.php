<?php

namespace ImagickDemo\Params;


use DataType\ExtractRule\GetFloatOrDefault;
use DataType\HasInputType;
use DataType\TypeSpec;
use DataType\InputType;
use DataType\ProcessRule\MaxFloatValue;
use DataType\ProcessRule\MinFloatValue;

#[\Attribute]
class AdaptiveOffset implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetFloatOrDefault(1 / 8),
            new MinFloatValue(0),
            new MaxFloatValue(1),
        );
    }
}
