<?php

namespace ImagickDemo\Imagick;


class IdentifyImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "";
    }

    function renderImage() {
    }

    function renderDescription() {

        $imagick = new \Imagick(realpath("../images/fnord.png"));
        $identifyInfo = $imagick->identifyimage(true);

        foreach ($identifyInfo as $key => $value) {

            echo "$key : ";

            if (is_array($value) == true) {
                var_dump($value);
            }
            else {
                echo $value;
            }

            echo "<br/>";
        }
    }
}