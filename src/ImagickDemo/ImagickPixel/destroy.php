<?php

namespace ImagickDemo\ImagickPixel;

class destroy extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "clear";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        $html = <<< HTML
<p>
  This is an alias to ImagickPixel::clear(), which also isn't a very useful function.
</p>
HTML;

        return $html;
    }
}
