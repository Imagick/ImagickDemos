<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;
use Params\ProcessRule\RangeFloatValue;
use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\NullIfEmpty;
use Params\ProcessRule\CastToFloat;

#[\Attribute]
class FourthTerm implements Param
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
            new RangeFloatValue(-1000, 1000)
        );
    }
}
