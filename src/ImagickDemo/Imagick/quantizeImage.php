<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\QuantizeImageControl;

class quantizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::quantizeImage";
    }

    public function renderDescription()
    {
        $output = <<< END

TreeDepth - Normally, this integer value is zero or one. A zero tells Quantize to choose a optimal tree depth of Log4(number_colors). A tree of this depth generally allows the best representation of the reference image with the least amount of memory and the fastest computational speed. In some cases, such as an image with low color dispersion (a few number of colors), a value other than Log4(number_colors) is required. To expand the color tree completely, use a value of 8.

<br/>
END;

        return $output;
    }

    public static function getParamType(): string
    {
        return QuantizeImageControl::class;
    }
}
