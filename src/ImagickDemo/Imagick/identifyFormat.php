<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Display;

class identifyFormat extends \ImagickDemo\Example
{
    /**
     * @return string
     */
    public function renderDescription()
    {
        return "Replaces any embedded formatting characters with the appropriate image property and returns the interpreted text. See <a href='http://www.imagemagick.org/script/escape.php'>http://www.imagemagick.org/script/escape.php</a> for escape sequences.";
    }

    /**
     * @return string
     */
    public function render()
    {
//Example Imagick::identifyFormat
        $output = "Output of 'Trim box: %@ number of unique colors: %k' is: <br/>";
        $imagick = new \Imagick(realpath("./images/artifact/mask.png"));
        $output .= $imagick->identifyFormat("Trim box: %@ number of unique colors: %k");
//Example end

        $output .= "<br/>";
        $output .= "For this image:<br/>";
        $output .= Display::renderImgTag('/images/artifact/mask.png');

        return $output;
    }
}
