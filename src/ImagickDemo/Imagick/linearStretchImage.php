<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\LinearStretchImageControl;

class linearStretchImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Linear stretch image";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderDescription()
    {
        $output = <<< END
 Discards any pixels below the black point and above the white point and levels the remaining pixels. The calculation is done by number of pixels, rather than absolute color values.

In the code example below using a value of 0.10 for both the black and white threshold, would move the darkest 10% of pixels to black, the lightest 10% of pixels to white, and level the remaining pixels.
  
A value of zero for either black or white point means that that end of the histogram is not adjusted.
END;

        return nl2br($output);
    }

    public static function getParamType(): string
    {
        return LinearStretchImageControl::class;
    }
}
