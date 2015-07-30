<?php

namespace ImagickDemo\Imagick;

class getImageGeometry extends \ImagickDemo\Example
{
    /**
     * @var \ImagickDemo\Control\ImageControl
     */
    private $imageControl;

    public function __construct(\ImagickDemo\Control\ImageControl $imageControl)
    {
        $this->imageControl = $imageControl;
        parent::__construct($imageControl);
    }


    public function renderDescription()
    {
        $output = <<< END
 
END;

        return nl2br($output);
    }


    public function render()
    {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        $output = "The values of getImageGeometry for the image below are:\n";
        foreach ($imagick->getImageGeometry() as $key => $value) {
            $output .= "$key : $value\n";
        }
        $output = nl2br($output);
        $output .= $this->renderImageURL();

        return $output;
    }
}
