<?php


namespace ImagickDemo\Tutorial;

class gradientReflection extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        $output = <<< END
Reflecting an an image vertically with a gradient on the transparency of the 
reflected version produces a nice effect for logos:
END;

        return nl2br($output);
    }


    public function renderTitle(): string
    {
        return "Gradient reflection";
    }


}
