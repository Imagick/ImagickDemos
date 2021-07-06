<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class Inverse implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('normal'),
            new EnumMap([
                'normal' => 'Normal',
                'inverse' => 'Inverse',
            ])
        );
    }

//class Inverse extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 0;
//    }
//
//    protected function getVariableName()
//    {
//        return 'inverse';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Inverse';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            0 => 'Normal',
//            1 => 'Inverse',
//        ];
//    }
//
//    public function getInverse()
//    {
//        return $this->key;
//    }
}
