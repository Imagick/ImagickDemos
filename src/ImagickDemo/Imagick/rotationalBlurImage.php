<?php

namespace ImagickDemo\Imagick;

class rotationalBlurImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        $output = "I have no idea how this is different from radialBlurImage. radialBlur is deprecated in ImageMagick";
        $output .= $this->renderImageURL();
        return $output;
    }
}
