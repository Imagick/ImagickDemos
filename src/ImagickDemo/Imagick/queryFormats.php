<?php

namespace ImagickDemo\Imagick;

class queryFormats extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::queryFormats";
    }

//Example Imagick::queryformats
    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = "";
        $input = \Imagick::queryformats();
        $columns = 6;

        $output .= "<table border='2'>";

        for ($i = 0; $i < count($input); $i += $columns) {
            $output .= "<tr>";
            for ($c = 0; $c < $columns; $c++) {
                $output .= "<td>";
                if (($i + $c) < count($input)) {
                    $output .= $input[$i + $c];
                }
                $output .= "</td>";
            }
            $output .= "</tr>";
        }

        $output .= "</table>";

        return $output;
    }
//Example end
}
