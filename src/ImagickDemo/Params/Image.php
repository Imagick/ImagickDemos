<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;


//TODO - rename this to imagePath


use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

class Image implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('renderImageSinusoid'),
            new EnumMap(getImagePathOptions())
        );
    }


//class Image extends \ImagickDemo\Params\OptionValueElement
//{
//    protected function getDefault()
//    {
//        return 'Lorikeet';
//    }
//
//    protected function getVariableName()
//    {
//        return 'imagePath';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Image";
//    }
//
//    protected function getOptions()
//    {
//        $images = [
//            "../public/images/Skyline_400.jpg" => 'Skyline',
//            "../public/images/Biter_500.jpg" => 'Lorikeet',
//            "../public/images/SydneyPeople_400.jpg" => 'People',
//            "../public/images/LowContrast.jpg" => 'Low contrast',
//        ];
//
//        return $images;
//    }
//
//    public function getImagePath()
//    {
//        return $this->getOptionKey();
//    }
}
