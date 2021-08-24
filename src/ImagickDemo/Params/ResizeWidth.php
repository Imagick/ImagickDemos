<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class ResizeWidth implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(200),
            new RangeIntValue(1, 800)
        );
    }
}
