<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class ResizeWidth implements Param
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
            new RangeIntValue(1, 800)
        );
    }

//class ResizeWidth extends ValueElement
//{
//    private $default;
//
//    public function __construct(VariableMap $variableMap, $defaultWidth = 200)
//    {
//        $this->default = $defaultWidth;
//
//        parent::__construct($variableMap);
//    }
//
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return $this->default;
//    }
//
//    protected function getMin()
//    {
//        return 1;
//    }
//
//    protected function getMax()
//    {
//        return 800;
//    }
//
//    protected function getVariableName()
//    {
//        return 'width';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Width';
//    }
//
//    public function getWidth()
//    {
//        return $this->getValue();
//    }
}
