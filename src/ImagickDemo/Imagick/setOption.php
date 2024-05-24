<?php

namespace ImagickDemo\Imagick;

use VarMap\VarMap;
use ImagickDemo\Imagick\Controls\SetOptionControl;

class setOption extends \ImagickDemo\Example
{
    private SetOptionControl $setOptionControl;

    public function __construct(VarMap $varMap)
    {
        $this->setOptionControl = SetOptionControl::createFromVarMap($varMap);
    }

    public function renderTitle(): string
    {
        return "Imagick::setOption";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }


    public function renderDescription()
    {
        $html = <<< HTML
<p>Setting options on an image allows for control of settings used to for encoders and decoders, and image processing operations.</p

<p>

<p>
If you are writing PNG images with transparency and color palettes, and want to strip all non-essential chunks, it is recommended to use:
<pre>
\$image->setOption('png:include-chunk', 'none,tRNS');
</pre>

rather than excluding all chunks, as without the transparent chunk, the image would be saved as 32bit PNG.
</p>


<p>
Many of the options available can be found on the <a href='https://imagemagick.org/script/defines.php'>ImageMagick site</a>
</p>

HTML;

        return $html;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        return customImage(
            $activeCategory,
            $activeExample,
            $this->setOptionControl->getValuesForForm(),
            $this
        );
    }

    public function renderCustomImage()
    {
        switch ($this->setOptionControl->getSetOptionExample()) {
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
// Restrict the maximum JPEG file size, for example -define jpeg:extent=400KB.
    public function renderJPG($extent)
    {
        $image_path = $this->setOptionControl->getImagePath();
        $imagick = new \Imagick(realpath($image_path));
        $imagick->setImageFormat('jpg');
        $imagick->setOption('jpeg:extent', $extent);
        header("Content-Type: image/jpeg");
        echo $imagick->getImageBlob();
    }
//Example end

//Example Imagick::setOption
// Render PNG with specific internal format.
// Valid values are png8, png24, png32, png48, png64, and png00.
    public function renderPNG($format)
    {
        $image_path = $this->setOptionControl->getImagePath();
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
        $image_path = $this->setOptionControl->getImagePath();
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

//Example Imagick::setOption
    public function renderBlackPoint()
    {
        // This
        $image_path = $this->setOptionControl->getImagePath();
        $imagick = new \Imagick();
        $imagick->setOption('black-point-compensation', 0.25 * \Imagick::getQuantum());
        $imagick->readImage(realpath($image_path));
        $imagick->setImageFormat('png');

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
//Example end

    public static function getParamType(): string
    {
        return SetOptionControl::class;
    }
}

