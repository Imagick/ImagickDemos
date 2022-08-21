<?php

namespace ImagickDemo\Imagick;

class constants extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Constants";
    }

    public function renderDescription()
    {
        $html = <<< HTML
These are all of the constants available in the Imagick class.<br/>

Please note, the values can change from one version of ImageMagick to another.<br/>
HTML;

        return $html;
    }
    
    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        $reflectionClass = new \ReflectionClass(\Imagick::class);
        $constants =  $reflectionClass->getConstants();

        ksort($constants);

        $output = "<table class='smallPadding' width='100%'>";
        $output .= "<tbody>";

        foreach ($constants as $name => $value) {
            $output .= "<tr>";
              $output .= "<td>$name</td>";
              $output .= "<td>$value</td>";
            $output .= "</tr>";
        }

        $output .= "</tbody>";
        $output .= "</table>";
        return $output;
    }
}
