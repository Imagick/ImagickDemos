<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

// ugh - think this needs to default to empty string or null

class ThirdTerm implements Param
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
            new RangeFloatValue(-1000, 10000)
        );
    }

//class ThirdTerm extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return '';
//    }
//
//    protected function getMin()
//    {
//        return -1000;
//    }
//
//    protected function getMax()
//    {
//        return 10000;
//    }
//
//    protected function getVariableName()
//    {
//        return 'thirdTerm';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Third term';
//    }
//
//    public function getThirdTerm()
//    {
//        return $this->getValue();
//    }
}
