<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class Width implements Param
{
    public function __construct(
        private int $default,
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault($this->default),
            new RangeIntValue(1, 500)
        );
    }

//class Width extends ValueElement
//{
//    private $default;
//
//    public function __construct(VariableMap $variableMap, $defaultWidth = 50)
//    {
//        $this->default = $defaultWidth;
//
//        parent::__construct($variableMap);
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
//        return 500;
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
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    public function getWidth()
//    {
//        return $this->getValue();
//    }
}
