<?php

namespace ImagickDemo\Params;


use DataType\ExtractRule\GetIntOrDefault;
use DataType\ProcessRule\EnumMap;
use DataType\HasInputType;
use DataType\InputType;

#[\Attribute]
class MontageType implements HasInputType
{
    public function __construct(
        private string $name
    ) {
    }

     public function getInputType(): InputType
    {
         return new InputType(
            $this->name,
            new GetIntOrDefault(\Imagick::MONTAGEMODE_FRAME),
            new EnumMap([
                \Imagick::MONTAGEMODE_FRAME => "Frame",
                \Imagick::MONTAGEMODE_UNFRAME => "Unframe",
                \Imagick::MONTAGEMODE_CONCATENATE => "Concatenate"
            ])
        );
    }
}
