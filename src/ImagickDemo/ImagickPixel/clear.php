<?php

namespace ImagickDemo\ImagickPixel;

class clear extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "clear";
    }

    public function renderDescription()
    {
        $html = <<< HTML
<p>
  Honestly, doesn't do much useful. It appears to reset the colorspace setting of the ImagickPixel to sRGBColorspace and clear an internal exception setting. I'd recommend not using it.
</p>
HTML;

        return $html;
    }
}
