<?php

namespace ImagickDemo\Imagick;

class setOption extends \ImagickDemo\Example
{
    /**
     * @var Control\setOption
     */
    protected $control;

    public function __construct(\ImagickDemo\Imagick\Control\setOption $control)
    {
        $this->control = $control;
    }

    public function renderTitle(): string
    {
        return "Imagick::setOption";
    }

    public function render()
    {
        return $this->renderCustomImageURL();
    }

    public function renderCustomImage()
    {
        switch ($this->control->getImageOption()) {
            case (0): {
                $this->renderJPG('10kb');
                break;
            }
            case (1): {
                $this->renderJPG('60kb');
                break;
            }
            case (2): {
                $this->renderPNG('png00');
                break;
            }
            case (3): {
                $this->renderPNG('png64');
                break;
            }
            case (4): {
                $this->renderCustomBitDepthPNG();
                break;
            }

            case (5): {
                $this->renderBlackPoint();
                break;
            }
        }
    }

//Example Imagick::setOption
    public function renderJPG($extent)
    {
        $image_path = $this->control->getImagePath();
        $imagick = new \Imagick(realpath($image_path));
        $imagick->setImageFormat('jpg');
        $imagick->setOption('jpeg:extent', $extent);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
//Example end

//Example Imagick::setOption
    public function renderPNG($format)
    {
        $image_path = $this->control->getImagePath();
        $imagick = new \Imagick(realpath($image_path));
        $imagick->setImageFormat('png');
        $imagick->setOption('png:format', $format);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
//Example end

    // color types.  Note that not all combinations are legal
    #define PNG_COLOR_TYPE_GRAY         0
    #define PNG_COLOR_TYPE_RGB          2
    #define PNG_COLOR_TYPE_PALETTE      3
    #define PNG_COLOR_TYPE_GRAY_ALPHA   4
    #define PNG_COLOR_TYPE_RGB_ALPHA    6
//Example Imagick::setOption
    public function renderCustomBitDepthPNG()
    {
        $image_path = $this->control->getImagePath();
        $imagick = new \Imagick(realpath($image_path));
        $imagick->setImageFormat('png');

        $imagick->setOption('png:bit-depth', '16');
        $imagick->setOption('png:color-type', 6);
        header("Content-Type: image/png");
        $crash = true;
        if ($crash) {
            echo $imagick->getImageBlob();
        } else {
            $tempFilename = tempnam('./', 'imagick');
            $imagick->writeimage(realpath($tempFilename));
            echo file_get_contents($tempFilename);
        }
    }

//Example end

    public function renderBlackPoint()
    {
        $image_path = $this->control->getImagePath();
        $imagick = new \Imagick();
        $imagick->setOption('black-point-compensation', 0.25 * \Imagick::getQuantum());
        $imagick->readImage(realpath($image_path));
        $imagick->setImageFormat('png');

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}
