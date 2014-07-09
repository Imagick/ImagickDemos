<?php

namespace ImagickDemo\Imagick;

class colorMatrixImage extends \ImagickDemo\Example {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }


    function render() {
        //http://www.imagemagick.org/Usage/color_mods/#color-matrix
        //http://www.c-sharpcorner.com/UploadFile/mahesh/Transformations0512192005050129AM/Transformations05.aspx
        //http://www.graficaobscura.com/matrix/index.html

        $output = <<< END

The values in the color matrix are used as: 

    <ul>
    <li>
    Matrix elements (0,0) to (4,4) are sampling factors, with the rows meaning red, green, blue, alpha output, and the columns being red, green, blue, alpha input.
    </li>
    <li>Last column is translation aka brightness adjustment.
    </li>
    <li>It's not entirely obvious what the other elements are.</li>
    
    </ul>


END;
 
        $output .= $this->renderImageURL('#0000ff');

        return $output;
    } 
}