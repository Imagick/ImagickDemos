<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class ResizeHeight implements Param
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
            new RangeIntValue(0, 1000)
        );
    }


//class ResizeHeight extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 200;
//    }
//
//    protected function getMin()
//    {
//        return 1;
//    }
//
//    protected function getMax()
//    {
//        return 1000;
//    }
//
//    protected function getVariableName()
//    {
//        return 'height';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Height';
//    }
//
//    protected function getHeight()
//    {
//        return $this->getValue();
//    }
}
