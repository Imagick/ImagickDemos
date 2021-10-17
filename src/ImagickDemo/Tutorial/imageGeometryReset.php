<?php

namespace ImagickDemo\Tutorial;

class imageGeometryReset extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Image geometry reset";
    }

    public function renderDescription()
    {
        $text = <<< END
After calling trimImage it leaves the image in a crop mode where the geometry of the canvas is 
different from that of the actual image.

When you call another function that uses the images geometry, it will be applied to the 'wrong' 
geometry, that of the uncropped image. e.g. When you are calling distortImage with 
Imagick::DISTORTION_ARC to produce an arc of text, this produces the unwanted effect of the 
text going off the image.

The way to fix this is to reset the geometry for the image through the Imagick function setImagePage 
which is called repage in the Image Magick manual.
END;

        return nl2br($text);
    }
}
