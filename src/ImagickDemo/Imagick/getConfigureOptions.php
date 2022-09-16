<?php

namespace ImagickDemo\Imagick;

class getConfigureOptions extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::getConfigureOptions";
    }

    public function renderDescription()
    {
        $html = <<< HTML
<p>Returns the list of configure options used by ImageMagick.</p>
HTML;
        return $html;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
//Example Imagick::getConfigureOptions
        $configure_options = \Imagick::getConfigureOptions();

        $output = "Configure options are:<pre>";
        foreach ($configure_options as $key => $value) {
            $output .= "$key: $value <br/>";
        }


        $output .= "</pre>";
//Example end
        return $output;
    }
}
