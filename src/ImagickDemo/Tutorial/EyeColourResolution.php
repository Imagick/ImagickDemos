<?php

namespace ImagickDemo\Tutorial;

class EyeColourResolution extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        $output = <<< END
Testing eye colour resolution.
END;

        return $output;
    }
    
    public function render()
    {
        return $this->renderImageURL();
    }
}
