<?php

namespace ImagickDemo\Imagick;

//\Imagick::COMPOSITE_DEFAULT

class orderedPosterizeImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

    public function renderDescription()
    {
        $output = <<< END
        
From the <a href='http://www.imagemagick.org/api/magick-image.php#MagickOrderedPosterizeImage'>ImageMagick manual for MagickOrderedPosterizeImage</a>: <i>A string containing the name of the threshold dither map to use, followed by zero or more numbers representing the number of color levels tho dither between.

For example: "o3x3,6" generates a 6 level posterization of the image with a ordered 3x3 diffused pixel dither being applied between each level. While checker,8,8,4 will produce a 332 colormaped image with only a single checkerboard hash pattern (50 grey) between each color level, to basically double the number of color levels with a bare minimim of dithering.</i>  ¯\_(ツ)_/¯

The predefined posterization types available are defined in the ImageMagick file: config/thresholds.xml
END;

        return nl2br($output);
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
