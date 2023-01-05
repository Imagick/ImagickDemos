<?php

namespace ImagickDemo\Params;

use DataType\ExtractRule\GetStringOrDefault;
use DataType\ProcessRule\EnumMap;
use DataType\HasInputType;
use DataType\InputType;

#[\Attribute]
class ChannelWithDefault implements HasInputType
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
            new EnumMap(getChannelOptions())
        );
    }
}
