<?php


namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class X implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(10),
            new RangeIntValue(0, 255)
        );
    }
}
