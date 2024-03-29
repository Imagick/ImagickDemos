<?php

namespace ImagickDemo\ImagickPixelIterator;

class IndexExample extends \ImagickDemo\Example
{
    public function getColumnRightOffset()
    {
        return 2;
    }

    public function renderTitle(): string
    {
        return "ImagickPixelIterator";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {

        $output = <<< END
<p>
   The ImagickPixelIterator class allows direct access to the pixels in an image. This allows you to either modify the pixels directly or analyze the pixels directly from PHP.
</p>

END;

        return $output;
    }
}
