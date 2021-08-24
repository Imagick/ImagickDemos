<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class GrayOnly implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('0'),
            new EnumMap([
                0 => 'All pixels',
                1 => 'Gray pixels only',
            ])
        );
    }
}
