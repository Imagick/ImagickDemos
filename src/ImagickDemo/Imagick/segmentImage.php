<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SegmentImageControl;

class segmentImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::segmentImage";
    }

    public function renderDescription()
    {
        $output = <<< END
        <p>This function is quite slow and prone to time out. Large values for the cluster and smooth threshold appear to be faster, and so safer.</p>

END;
        return $output;
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return SegmentImageControl::class;
    }
}
