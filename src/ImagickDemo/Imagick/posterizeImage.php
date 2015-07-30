<?php

namespace ImagickDemo\Imagick;

class posterizeImage extends \ImagickDemo\Example
{
    use OriginalImageFile;

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
