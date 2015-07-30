<?php

namespace ImagickDemo\Imagick;

class evaluateImage extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        $output = <<< END
The operations are split into two types:<ul><li>Quantum scaled operators. These take floating point numbers as the parameter, usally in the scale 0 to 1.
<li>Exact operators. These take integers as the param.</li></ul>
END;

        $output = nl2br($output);

        return $output;
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
