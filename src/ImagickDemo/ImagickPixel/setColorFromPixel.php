<?php

namespace ImagickDemo\ImagickPixel;

class setColorFromPixel extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "ImagickPixel::setColorFromPixel";
    }

    public function renderDescription()
    {
        $html = <<< HTML
<p>
Sets the color of one ImagickPixel from another ImagickPixel object.
</p>
<p>
This method is included for completeness; the underlying function is useful in the C programming language but in PHP it is easy to copy values around.
</p>
HTML;


        return $html;
    }
}
