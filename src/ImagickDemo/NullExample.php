<?php

namespace ImagickDemo;

class NullExample extends \ImagickDemo\Example
{
    public function __construct(\ImagickDemo\Control\NullControl $control)
    {
        $this->control = $control;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        return "";
    }
}
