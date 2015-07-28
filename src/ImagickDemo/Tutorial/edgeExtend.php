<?php

namespace ImagickDemo\Tutorial;

class edgeExtend extends \ImagickDemo\Example
{
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
    
    public function render()
    {
        return $this->renderImageURL();
    }
}
