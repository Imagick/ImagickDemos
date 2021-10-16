<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Tutorial\Controls\EdgeExtendControls;
use VarMap\VarMap;

class edgeExtend extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Edge extend ";
    }

    public function renderDescription()
    {
        $output = <<< END
Sometimes it is necessary to make an image fill a larger space than it currently 
occupies, without distorting the image. This can be accomplished by setting an 
appropriate virtualPixelMethod, and then resizing the image using the distortImage 
method, and the Imagick::DISTORTION_AFFINEPROJECTION constant.";
END;

        return $output;
    }
    


    public static function getParamType(): string
    {
        return EdgeExtendControls::class;
    }
}
