<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Tutorial\Controls\LevelizeImageControls;

class levelizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Levelize image";
    }

    public function renderDescription()
    {
        $output = <<< 'END'
<p>The ImageMagick library has a <a href='http://www.imagemagick.org/Usage/color_mods/#level_plus'>Reversed 
Level Adjustment</a> function. This function is not exposed in through the ImageMagick Wand API and so it 
is not usable in Imagick. However we can achive the same result by using the evaluate command in two steps.</p>
<p>

So to do the equivalent of:
</p>

<pre>convert -size 300x300 gradient:black-white +level 50x100%</pre>
<br/>
<p>
Or more generally:
</p>
<pre>
convert -size 300x300 gradient:black-white +level ${blackPoint}x${whitePoint}%
</pre>

<p>
You can use use Imagick::evaluateImage with a separate EVALUATE_POW, EVALUATE_MULTIPLY, EVALUATE_ADD

</p>
END;
        return $output;
    }


    /**
     * @return \ImagickDemo\Control
     */
    public function getControl()
    {
        return $this->control;
    }



    public static function getParamType(): string
    {
        return LevelizeImageControls::class;
    }
}
