<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

class MontageType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(\Imagick::MONTAGEMODE_FRAME),
            new EnumMap([
                \Imagick::MONTAGEMODE_FRAME => "Frame",
                \Imagick::MONTAGEMODE_UNFRAME => "Unframe",
                \Imagick::MONTAGEMODE_CONCATENATE => "Concatenate"
            ])
        );
    }

//
//class MontageType extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return \Imagick::MONTAGEMODE_FRAME;
//    }
//
//    protected function getVariableName()
//    {
//        return 'montageType';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Montage type";
//    }
//
//    public function getOptions()
//    {
//        return [
//            \Imagick::MONTAGEMODE_FRAME => "Frame",
//            \Imagick::MONTAGEMODE_UNFRAME => "Unframe",
//            \Imagick::MONTAGEMODE_CONCATENATE => "Concatenate"
//        ];
//    }
//
//    public function getMontageType()
//    {
//        return $this->getKey();
//    }
}
