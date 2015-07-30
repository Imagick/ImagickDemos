<?php


namespace ImagickDemo\Imagick;

use ImagickDemo\Control\ImageControl;

abstract class ImagickExample extends \ImagickDemo\Example
{
    protected $imagePath;

    /**
     * @var \ImagickDemo\Control\ImageControl
     */
    protected $imageControl;

    public function __construct(ImageControl $imageControl)
    {
        $this->imageControl = $imageControl;
        $this->imagePath = $imageControl->getImagePath();
    }

    public function getControl()
    {
        return $this->imageControl;
    }

    public function getURL()
    {
        return $this->imageControl->getURL();
    }

    public function renderImageURL()
    {
        return $this->imageControl->getURL();
    }
}
