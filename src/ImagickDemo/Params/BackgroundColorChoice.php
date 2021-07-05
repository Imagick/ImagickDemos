<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;


class BackgroundColorChoice implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('white'),
            new EnumMap([
                "white" => "White",
                "black" => "Black",
                //"none" => "Transparent", //This needs webp to be nice.
            ])
        );
    }

//    protected function getDefault()
//    {
//        return "";
//    }
//
//    protected function getVariableName()
//    {
//        return 'backgroundColor';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Background color";
//    }
//
//    public function getOptions()
//    {
//        return [
//            "white" => "White",
//            "black" => "Black",
//            //"none" => "Transparent", //This needs webp to be nice.
//        ];
//    }
//
//    public function getBackgroundColorChoiceType()
//    {
//        return $this->getKey();
//    }
}
