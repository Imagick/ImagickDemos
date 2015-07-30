<?php

namespace ImagickDemo\Imagick;

class identifyImage extends \ImagickDemo\Example
{
    public function render()
    {
        $imagick = new \Imagick(realpath("images/fnord.png"));
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
