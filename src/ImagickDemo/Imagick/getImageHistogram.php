<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class getImageHistogram extends \ImagickDemo\Example
{

    protected $image_path;

    /**
     * @var ImageControl
     */
    protected $control;

    public function __construct(ImageControl $imageControl)
    {
        $this->control = $imageControl;
    }

    public function getControl()
    {
        return $this->control;
    }

    public function render()
    {
        $output = "This is the histogram:<br/>";
        $output .= sprintf("<img src='%s' />", $this->control->getURL());
        $output .= "<br/>For this image:<br/>";
        $output .= sprintf("<img src='%s' />", $this->control->getCustomImageURL());

        return $output;
    }

    public function renderCustomImage()
    {
        $imagick = new \Imagick(realpath($this->control->getImagePath()));
        header("Content-Type: image/jpg");
        echo $imagick;
    }

    public function renderImage()
    {
    }

    public function hasReactControls(): bool
    {
        return false;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
