<?php

namespace ImagickDemo\Imagick;

class identifyImageProperties extends \ImagickDemo\Example {

    /**
     * @return string
     */
    function renderDescription() {
        return "Replaces any embedded formatting characters with the appropriate image property and returns the interpreted text. See <a href='http://www.imagemagick.org/script/escape.php'>http://www.imagemagick.org/script/escape.php</a> for escape sequences.";
    }

    /**
     * @return string
     */
    function render() {
//Example Imagick::identifyImageProperties
        $output = "Output of 'Trim box: %@ number of unique colors: %k' is: <br/>";
        $imagick = new \Imagick(realpath("images/artifact/mask.png"));
        $output .= $imagick->identifyImageProperties("Trim box: %@ number of unique colors: %k");
//Example end

        $output .= "<br/>";
        $output .= "For this image:<br/>";
        $output .= renderImgTag('/images/artifact/mask.png');
        
        return $output;
    }
}