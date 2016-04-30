<?php

namespace ImagickDemo\Imagick;

class posterizeImage extends \ImagickDemo\Example
{
    function getOriginalImage()
    {
        return $this->control->getOriginalURL();
    }

    function getOriginalFilename()
    {
        return $this->control->getImagePath();
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
