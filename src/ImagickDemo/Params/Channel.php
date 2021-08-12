<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class Channel implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('All'),
            new EnumMap(getChannelOptions())
        );
    }
}
