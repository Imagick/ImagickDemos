<?php

declare(strict_types = 1);

namespace ImagickDemo;

use ImagickDemo\Control\ImageControl as LegacyImageControl;
use ImagickDemo\Imagick\Controls\ImageControl;
use VarMap\VarMap;

abstract class ReactExample extends Example
{
    abstract public static function getParamType(): string;

    protected $paramControl;

    public function __construct(
        LegacyImageControl $imageControl,
        VarMap $varMap
    ) {

        parent::__construct($imageControl);
        $paramType = $this->getParamType();

        $this->paramControl = $paramType::createFromVarMap($varMap);
    }

    function getOriginalImage()
    {
        if (method_exists($this->paramControl, 'getImagePath') === false) {
            $message = sprintf(
                "Trying to call getOriginalImage on an example where the control (%s) doesn't have getImagePath",
                get_class($this->paramControl)
            );

            throw new \Exception($message);
        }

        $path = $this->paramControl->getImagePath();
        $path = str_replace("/var/app/public", "", $path);

        return $path;
    }


//    function getOriginalFilename()
//    {
//        //return $this->control->getImagePath();
//        return realpath(__DIR__ . "/../../../public/images/Biter_500.jpg");
//    }

}
