<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

class Sharpening implements Param
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
                0 => 'Decrease',
                1 => 'Increase',
            ])
        );
    }

//class Sharpening extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 1;
//    }
//
//    protected function getVariableName()
//    {
//        return 'sharpening';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Contrast';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            0 => 'Decrease',
//            1 => 'Increase',
//        ];
//    }
//
//    public function getSharpening()
//    {
//        return $this->key;
//    }
}
