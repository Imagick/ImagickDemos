<?php

namespace ImagickDemo\Imagick;

//use ImagickDemo\Imagick\Controls\AdaptiveBlurImageControl;
use ImagickDemo\Imagick\Controls\NewPseudoImageControl;

class newPseudoImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::newPseudoImage";
    }

    public function renderDescription()
    {
        $html = <<< HTML
        
A full list of <a href="https://imagemagick.org/script/formats.php#pseudo">pseudo <a/> and
<a href="https://imagemagick.org/script/formats.php#builtin-images">built-in images </a> are available.<br/>

Note, image size is not used for all canvas types. Some have a single set size e.g. rose, logo.<br/>
HTML;

        return $html;

    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = $this->renderDescription();
        $output .= $this->renderImageURL();

        return $output;
    }

    public static function getParamType(): string
    {
        return NewPseudoImageControl::class;
    }
}
