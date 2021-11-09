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
    ) {
        $path = realpath(__DIR__."/../../../public/images/fnord.png");
        
        $imagick = new \Imagick($path);
        $identifyInfo = $imagick->identifyimage(true);

        $output = "";

        foreach ($identifyInfo as $key => $value) {
            $output .= "$key : ";

            if (is_array($value) == true) {
                $output .= var_export($value, true);
            }
            else {
                $output .=  $value;
            }

            $output .= "<br/>";
        }

        return $output;
    }
}
