<?php

namespace ImagickDemo\Imagick;

class identifyImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Identify image";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $path = realpath(__DIR__."/../../../public/images/fnord.png");
        
        $imagick = new \Imagick($path);
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
