<?php

namespace ImagickDemo\Imagick;

class posterizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::posterizeImage";
    }
    
    public function renderDescription()
    {
        $output = <<< END

END;

        return nl2br($output);
    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
