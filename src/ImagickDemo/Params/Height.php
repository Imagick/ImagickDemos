<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;


class Height implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(20),
            new RangeIntValue(1, 500),
        );
    }

//class Height extends ValueElement
//{
//    private $default;
//
//    public function __construct(VariableMap $variableMap, $defaultHeight = 20)
//    {
//        $this->default = $defaultHeight;
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
//        return 'height';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Height';
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    public function getHeight()
//    {
//        return $this->getValue();
//    }
}
