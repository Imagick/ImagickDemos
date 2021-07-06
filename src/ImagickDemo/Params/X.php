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

//class X extends ValueElement
//{
//    private $defaultX;
//
//    public function __construct(VariableMap $variableMap, $defaultX = 10)
//    {
//        $this->defaultX = $defaultX;
//        parent::__construct($variableMap);
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getDefault()
//    {
//        return $this->defaultX;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 255;
//    }
//
//    protected function getVariableName()
//    {
//        return 'x';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'X';
//    }
//
//    public function getX()
//    {
//        return $this->getValue();
//    }
}
