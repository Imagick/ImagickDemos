<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class MeanOffset implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(5),
            new RangeIntValue(0, 10)
        );
    }

//class MeanOffset extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 5;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 10;
//    }
//
//    protected function getVariableName()
//    {
//        return 'meanOffset';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Mean offset';
//    }
//
//    public function getMeanOffset()
//    {
//        return $this->getValue();
//    }
}
