<?php


namespace ImagickDemo\Tutorial;


class levelizeImage extends \ImagickDemo\Example {

    function render() {

        $output = <<< 'END'
<p>The ImageMagick library has a <a href='http://www.imagemagick.org/Usage/color_mods/#level_plus'>Reversed Level Adjustment</a> function. This function is not exposed in through the ImageMagick Wand API and so it is not usable in Imagick</p>
<p>
However we can achive the same result by using the evaluate command in two steps.

<pre>convert -size 500x100 gradient:black-white +level 50x100%</pre>

<pre>
convert -size 500x100 gradient:black-white +level ${blackPoint}x${whitePoint}%</pre>


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