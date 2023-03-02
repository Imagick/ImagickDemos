<?php

namespace ImagickDemo\Development;

class IndexExample extends \ImagickDemo\Example
{
    public function getColumnRightOffset()
    {
        return 2;
    }

    public function renderTitle(): string
    {
        return "Development";
    }
    
    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {

        $output = <<< END
<p>
    A misc selection of stuff, including how to compile it.
</p>

END;

        return $output;
    }
}
