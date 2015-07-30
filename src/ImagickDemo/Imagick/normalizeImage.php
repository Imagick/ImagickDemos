<?php

namespace ImagickDemo\Imagick;

class normalizeImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function render()
    {
        $output = "Original on left side, normalised on right. <br/>";
        $output .= $this->renderImageURL();
        return $output;
    }
}
