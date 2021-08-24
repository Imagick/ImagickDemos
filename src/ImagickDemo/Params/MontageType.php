<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class MontageType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
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
