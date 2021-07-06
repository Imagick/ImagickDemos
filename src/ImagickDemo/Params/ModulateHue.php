<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class ModulateHue implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(150),
            new RangeIntValue(0, 200)
        );
    }

//class ModulateHue extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 150;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 200;
//    }
//
//    protected function getVariableName()
//    {
//        return 'hue';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Hue';
//    }
//
//    public function getHue()
//    {
//        return $this->getValue();
//    }
}
