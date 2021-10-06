<?php

namespace ImagickDemo\Tutorial;

class screenEmbed extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Screen embed";
    }

    public function renderDescription()
    {
        $output = <<< END
The Imagick::distortImage function can be used to do the appropriate perspective to take an image, and make it look like it is on a screen in a different image.
END;

        return nl2br($output);
    }

    public function render()
    {
        $output = "";
        $output .= $this->renderImageURL();
        return $output;
    }
}
