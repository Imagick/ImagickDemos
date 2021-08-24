<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

// ugh - think this needs to default to empty string or null

#[\Attribute]
class TranslateY implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(75),
            new RangeFloatValue(0, 500)
        );
    }
}
