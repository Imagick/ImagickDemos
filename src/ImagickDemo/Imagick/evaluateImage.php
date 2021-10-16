<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\EvaluateImageControl;

class evaluateImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Evaluate image";
    }

    public function renderDescription()
    {
        $output = <<< END
The operations are split into two types:<ul><li>Quantum scaled operators. These take floating point numbers as the parameter, usally in the scale 0 to 1.
<li>Exact operators. These take integers as the param.</li></ul>
END;

        $output = nl2br($output);

        return $output;
    }





    public static function getParamType(): string
    {
        return EvaluateImageControl::class;
    }
}
