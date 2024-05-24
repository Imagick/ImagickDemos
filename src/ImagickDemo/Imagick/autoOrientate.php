<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\AdaptiveBlurImageControl;

class autoOrientate extends Example
{
    public function renderTitle(): string
    {
        return "Auto-orientate";
    }

    public function renderDescription()
    {
        return "Adjusts an image so that its orientation is suitable for viewing (i.e. top-left orientation).";
    }
}
