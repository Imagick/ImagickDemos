<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Tutorial\Controls\ImagickCompositeGenControls;

class imagickCompositeGen extends \ImagickDemo\Example
{

    public function renderTitle()
    {
        return "";
    }

    public function renderDescription()
    {
        $output = <<< END
This is a more complicated example of how to cross fade a row of images with smooth transitions between each image.

It creates the gradients for blending as required, which allows the transition between the images to be controlled.

END;

        return nl2br($output);
    }


    public function render()
    {
        return $this->renderImageURL();
    }



    public static function getParamType(): string
    {
        return ImagickCompositeGenControls::class;
    }
}
