<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class OriginY implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(250),
            new RangeIntValue(0, 500)
        );
    }

//class OriginY extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 250;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 500;
//    }
//
//    protected function getVariableName()
//    {
//        return 'originY';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Origin Y';
//    }
//
//    public function getOriginY()
//    {
//        return $this->getValue();
//    }
}
