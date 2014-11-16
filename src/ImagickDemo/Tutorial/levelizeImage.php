<?php


namespace ImagickDemo\Tutorial;


class levelizeImage extends \ImagickDemo\Example {

    function render() {

        $output = <<< 'END'
<p>The ImageMagick library has a <a href='http://www.imagemagick.org/Usage/color_mods/#level_plus'>Reversed Level Adjustment</a> function. This function is not exposed in through the ImageMagick Wand API and so it is not usable in Imagick. However we can achive the same result by using the evaluate command in two steps.</p>
<p>

So to do the equivalent of:

<pre>convert -size 300x300 gradient:black-white +level 50x100%</pre>
<br/>
Or more generally:

<pre>
convert -size 300x300 gradient:black-white +level ${blackPoint}x${whitePoint}%
</pre>

You can use use Imagick::evaluateImage with a separate EVALUATE_POW, EVALUATE_MULTIPLY, EVALUATE_ADD

</p>
END;
  
        $output .= "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }
}