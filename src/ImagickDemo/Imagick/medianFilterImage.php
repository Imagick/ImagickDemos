<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\MedianFilterImageControl;

class medianFilterImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Median filter image";
    }

    public function render()
    {
//        return $this->renderImageURL();

        $html = <<< HTML
    Doesn't exist on ImageMagick 7 - write equivalant

median_image=StatisticImage(image,MedianStatistic,(size_t) radius,(size_t)
    radius,exception);
HTML;

        return $html;

    }

    public function isRemovedInIM7()
    {
        return true;
    }

    public function renderIM7Migration()
    {
        $html = <<< HTML
    Doesn't exist on ImageMagick 7 - write equivalant

median_image=StatisticImage(image,MedianStatistic,(size_t) radius,(size_t)
    radius,exception);
HTML;

        return $html;
    }
}
