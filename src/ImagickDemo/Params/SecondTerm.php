<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;
use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\NullIfEmpty;
use Params\ProcessRule\CastToFloat;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class SecondTerm implements Param
{
    public function __construct(
        private string $default,
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault($this->default),
            new NullIfEmpty(),
            new CastToFloat(),
            new RangeFloatValue(-1000, 10000)
        );
    }
}
