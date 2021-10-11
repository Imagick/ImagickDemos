<?php

namespace ImagickDemo\Imagick;

class setImageResolution extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageResolution";
    }

    public function renderDescription()
    {
        $output = <<< END
Sets the image resolution, which is a hint to printers of what size to print the image i.e. how many dots per inch it should be printed at. This function does not affect the pixel dimensions of the image, and so does not have a noticeable effect on the image on a computer, which does not use the DPI setting to render an image. 
END;

        return nl2br($output);
    }

    public function render()
    {
        return "";
    }
}
