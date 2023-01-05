<?php

namespace ImagickDemo\Params;

use DataType\HasInputType;
use DataType\InputType;
use DataType\ProcessRule\RangeFloatValue;
use DataType\ExtractRule\GetStringOrDefault;
use DataType\ProcessRule\NullIfEmpty;
use DataType\ProcessRule\CastToFloat;

#[\Attribute]
class FourthTerm implements HasInputType
{
    public function __construct(
        private string $default,
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetStringOrDefault($this->default),
            new NullIfEmpty(),
            new CastToFloat(),
            new RangeFloatValue(-1000, 1000)
        );
    }
}
