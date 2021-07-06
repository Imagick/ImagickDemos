<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

#[\Attribute]
class TextDecoration implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(\Imagick::DECORATION_UNDERLINE),
            new EnumMap([
                \Imagick::DECORATION_NO => 'None',
                \Imagick::DECORATION_UNDERLINE => 'Underline',
                \Imagick::DECORATION_OVERLINE => 'Overline',
                \Imagick::DECORATION_LINETROUGH => 'Linethrough'
            ])
        );
    }

//class TextDecoration extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return \Imagick::DECORATION_UNDERLINE;
//    }
//
//    protected function getVariableName()
//    {
//        return 'textDecoration';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Text decoration';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            \Imagick::DECORATION_NO => 'None',
//            \Imagick::DECORATION_UNDERLINE => 'Underline',
//            \Imagick::DECORATION_OVERLINE => 'Overline',
//            \Imagick::DECORATION_LINETROUGH => 'Linethrough'
//        ];
//    }
//
//    public function getTextDecoration()
//    {
//        return $this->key;
//    }
}
