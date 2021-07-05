<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

class UnsharpThreshold implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(0),
            new RangeFloatValue(0, 20)
        );
    }

//class UnsharpThreshold extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 0;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 20;
//    }
//
//    protected function getVariableName()
//    {
//        return 'unsharpThreshold';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Unsharp threshold';
//    }
//
//    public function getUnsharpThreshold()
//    {
//        return $this->getValue();
//    }
}
