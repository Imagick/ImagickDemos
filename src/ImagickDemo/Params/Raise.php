<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

class Raise implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(1),
            new EnumMap([
                0 => 'Lower',
                1 => 'Raise',
            ])
        );
    }

//class Raise extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 1;
//    }
//
//    protected function getVariableName()
//    {
//        return 'raise';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Raise';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            0 => 'Lower',
//            1 => 'Raise',
//        ];
//    }
//
//    public function getRaise()
//    {
//        return $this->key;
//    }
}
