<?php

namespace ImagickDemo\Imagick;

function print_table($metrics)
{
    $output = "<table class='infoTable'>";

    foreach ($metrics as $key => $value) {
        if (is_array($value)) {
            $value = print_table($value);
        }

        $output .= sprintf(
            "<tr>
                <td valign='top'>%s</td>
                <td>&nbsp;</td>
                <td>%s</td>
            </tr>",
            $key,
            $value
        );
    }

    $output .= "</table>";

    return $output;
}

class queryFontMetrics extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::queryFontMetrics";
    }
    

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $text = "Lorem ipsum";
        $im = new \Imagick();
        $draw = new \ImagickDraw();
        $draw->setStrokeColor("none");
        $draw->setFont("../fonts/Arial.ttf");
        $draw->setFontSize(96);
        $draw->setTextAlignment(\Imagick::ALIGN_LEFT);
        $metrics = $im->queryFontMetrics($draw, $text);

        return print_table($metrics);
    }
}
