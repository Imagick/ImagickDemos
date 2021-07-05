<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

// ugh - think this needs to default to empty string or null

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


//class TranslateY extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 75;
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
//        return 'translateY';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Translate Y';
//    }
//
//    public function getTranslateY()
//    {
//        return $this->getValue();
//    }
}
