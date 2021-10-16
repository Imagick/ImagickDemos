<?php

namespace ImagickDemo\Imagick;

class levelImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Level image";
    }


    public function renderDescription()
    {
        $output = <<< END

The <a href='http://www.imagemagick.org/Usage/color_mods/#level_plus'>'Reversed level adjustment'</a> function isn't exposed as function in the ImageMagick library so isn't usable in Imagick.

Instead you can use the <a href='/Imagick/evaluateImage'>evaluateImage</a> function to achive the same effect. Please see the <a href='/Tutorial/levelizeImage'>levelizeImage tutorial</a>.
END;

        $output = nl2br($output);

        return $output;
    }


}
