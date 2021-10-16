<?php

namespace ImagickDemo\Imagick;

class compositeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Composite image";
    }

    public function renderDescription()
    {
        $tutorialURL = '/Tutorial/composite';

        $output = '';
        $output .= "This is a simple example. Please look at the <a href='$tutorialURL'>full composite tutorial</a> for more examples.<br/>";

        return $output;
    }
}
