<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

#[\Attribute]
class Sharpening implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(1),
            new EnumMap([
                0 => 'Decrease',
                1 => 'Increase',
            ])
        );
    }
}
