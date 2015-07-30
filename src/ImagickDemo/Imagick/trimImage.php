<?php

namespace ImagickDemo\Imagick;

class trimImage extends \ImagickDemo\Example
{
    public function render()
    {
        $output = 'Two things should be noted from the above. First is like "-crop", "-trim" will retain the canvas size of the image. This means that the numerical arguments of the trim can be extracted, to allow for further processing, or adjustment of the of the image processing (see Trimming "Noisy" Images for an example of doing this). <br/>';

        $output .= $this->renderImageURL();

        return $output;
    }
}
