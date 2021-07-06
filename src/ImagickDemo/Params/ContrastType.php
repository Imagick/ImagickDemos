<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class ContrastType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('1'),
            new EnumMap([
                0 => 'Enabled - unsharpen',
                1 => 'Enabled - sharpen',
                2 => 'Disabled'
            ])
        );
    }

//class ContrastType extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 1;
//    }
//
//    protected function getVariableName()
//    {
//        return 'contrastType';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Contrast type';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            0 => 'Enabled - unsharpen',
//            1 => 'Enabled - sharpen',
//            2 => 'Disabled'
//        ];
//    }
//
//    public function getContrastType()
//    {
//        return $this->key;
//    }
}
