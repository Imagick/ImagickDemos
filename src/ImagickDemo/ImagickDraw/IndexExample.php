<?php

namespace ImagickDemo\ImagickDraw;

class IndexExample extends \ImagickDemo\Example
{
    public function getColumnRightOffset()
    {
        return 2;
    }

    public function renderTitle()
    {
        return "ImagickDraw";
    }

    public function render()
    {
        $output = <<< END

The ImagickDraw class allows drawing vector based images through ImageMagick. Those vector based images can then be saved to a file, exported as SVG or used for further processing. 

END;

        return $output;
    }

    public function renderImage()
    {
    }
}
