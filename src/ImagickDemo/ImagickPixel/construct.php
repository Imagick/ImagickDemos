<?php

namespace ImagickDemo\ImagickPixel;

class construct extends \ImagickDemo\Example
{
    private $columns = 4;

    private $exampleColors = array(
        "rgba(100%, 0%, 0%, 0.5)",
        "hsb(33.3333%, 100%,  75%)", // medium green
        "hsl(120, 255,   191.25)", //medium green
        "graya(50%, 0.5)", //  semi-transparent mid gray
        "LightCoral", "none", //"cmyk(0.9, 0.48, 0.83, 0.50)",
        "#f00", //  #rgb
        "#ff0000", //  #rrggbb
        "#ff0000ff", //  #rrggbbaa
        "#ffff00000000", //  #rrrrggggbbbb
        "#ffff00000000ffff", //  #rrrrggggbbbbaaaa
        "rgb(255, 0, 0)", //  an integer in the range 0—255 for each component
        "rgb(100.0%, 0.0%, 0.0%)", //  a float in the range 0—100% for each component
        "rgb(255, 0, 0)", //  range 0 - 255
        "rgba(255, 0, 0, 1.0)", //  the same, with an explicit alpha value
        "rgb(100%, 0%, 0%)", //  range 0.0% - 100.0%
        "rgba(100%, 0%, 0%, 1.0)", //  the same, with an explicit alpha value
    );

    public function renderTitle(): string
    {
        return "construct";
    }


    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        $output = "<table>";
        for ($x = 0; $x < count($this->exampleColors); $x++) {
            if (($x % $this->columns) == 0) {
                if ($x != 0) {
                    $output .= "</tr>";
                }
                $output .= "<tr>";
            }

            $output .= "<td>";
            $output .= $this->exampleColors[$x];
            $output .= "</td>";
        }

        for (; $x < $this->columns; $x++) {
            $output .= "<tr>";
        }

        $output .= "</tr>";
        $output .= "</table>";
        $output .= "<img src='/image/ImagickPixel/construct' />";

        return $output;
    }
}
