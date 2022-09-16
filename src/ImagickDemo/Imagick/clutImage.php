<?php

namespace ImagickDemo\Imagick;

use Imagick;

class clutImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "CLUT image";
    }

    public function renderDescription()
    {
        $output = <<< END
Applies a Colour LookUp Table to an image. The CLUT should be an image 1 pixel wide.

The colours will be 'looked up' in the clut by using the intensity of each pixel in source image e.g. black will be taken from one end of the CLUT, white the other end, and all other values interpolated from there relevant position in the CLUT, according to the set interpolation method.
    
 Using \Imagick::INTERPOLATE_BILINEAR means that a very small clut can be used to generate a smooth palette of colours.
END;

        return nl2br($output);

    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        return "<img src='/customImage/$activeCategory/$activeExample' alt='clut image example'/>";
    }

    public function renderCustomImage()
    {
        $this->clutImage();
    }

    public function metalicFont()
    {
        //Make a gradient
        $draw = new \ImagickDraw();
        $draw->setStrokeOpacity(0);
        $draw->setFillColor('white');
        $draw->setFont("../fonts/CANDY.TTF");
        $draw->setFontSize(160);
        $draw->annotation(50, 150, "Imagick!");
        $text = new Imagick();
        $text->newPseudoImage(600, 300, 'xc:black');
        $text->drawImage($draw);
        $text->setImageFormat('png');
        $text->blurImage(5, 2, \Imagick::CHANNEL_ALPHA);
        $text->levelImage(0.4, 0.6, \Imagick::CHANNEL_ALPHA);
        $text->blurImage(3, 3);
//        header("Content-Type: image/png");
//        echo $text->getImageBlob();

//        convert \
//        -size 1x1000 gradient:  -gamma 0.9 \
//        -function Sinusoid 2.25,0,0.5,0.5 \
//        \( gradient:'rgb(100%,100%,80%)-black' -gamma 1 \) \
//        +swap \
//        -compose Overlay -composite \
//        -rotate 90 \
//        metallic_clut.png

        $gradient = new Imagick();
        $gradient->newPseudoImage(50, 1000, 'gradient:');
        $gradient->gammaImage(0.9);
        $gradient->functionImage(\Imagick::FUNCTION_SINUSOID, [2.25, 0, 0.5, 0.5]);

        $gradient2 = new Imagick();
        $gradient2->newPseudoImage(50, 1000, "gradient:rgb(100%,100%,80%)-black");
        $gradient2->gammaImage(1);
        $gradient2->compositeImage($gradient, \Imagick::COMPOSITE_OVERLAY, 0, 0);
        $gradient2->compositeImage($gradient2, \Imagick::COMPOSITE_OVERLAY, 0, 0);
        $gradient2->rotateimage('red', 90);
        $gradient2->setImageFormat('png');
        header("Content-Type: image/png");
        echo $gradient2->getImageBlob();


//        convert metallic_input.png -set colorspace RGB \
//        \( -clone 0 -alpha off \
//        -sparse-color Barycentric "0,0 White  0,%[fx:h-1] Black" \
//        -alpha on \
//        \) \
//        \( -clone 0 -alpha extract -shade 135x45 -auto-gamma -auto-level \
//        -alpha on -channel A -level 0%x10% +channel \
//        \) \
//        -delete 0 -compose Overlay -composite \
//        metallic_clut.png -clut  -set colorspace sRGB \
//        \
//  \( +clone -background navy -shadow 80x2+5+5 \
//        \) +swap -background None -compose Over -layers merge \
//        \
//        -trim +repage metallic.png

    }

    public function clutImage()
    {
//Example Imagick::clutImage
        // Make a shape
        $draw = new \ImagickDraw();
        $draw->setStrokeOpacity(0);
        $draw->setFillColor('black');
        $points = [
            ['x' => 40 * 3, 'y' => 10 * 5],
            ['x' => 20 * 3, 'y' => 20 * 5],
            ['x' => 70 * 3, 'y' => 50 * 5],
            ['x' => 80 * 3, 'y' => 15 * 5],
        ];
        $draw->polygon($points);
        $imagick = new \Imagick();
        $imagick->newPseudoImage(
            300, 300,
            "xc:white"
        );

        $imagick->drawImage($draw);
        $imagick->blurImage(0, 10);

        //Make a gradient
        $draw = new \ImagickDraw();
        $draw->setStrokeOpacity(1);
        $draw->setFillColor('red');
        $draw->point(0, 2);
        $draw->setFillColor('yellow');
        $draw->rectangle(0, 0, 1, 1);
        $gradient = new Imagick();
        $gradient->newPseudoImage(1, 5, 'xc:none');
        $gradient->drawImage($draw);
        $gradient->setImageFormat('png');

        //These two are needed for the clutImage to work reliably.
        $imagick->setImageAlphaChannel(\Imagick::ALPHACHANNEL_DEACTIVATE);
        $imagick->transformImageColorspace(\Imagick::COLORSPACE_GRAY);
        // $imagick->setImageInterpolateMethod(\Imagick::INTERPOLATE_INTEGER);

        //Make the color lookup be smooth
        $gradient->setImageInterpolateMethod(\Imagick::INTERPOLATE_BILINEAR);
        //Nearest neighbour uses exact color values from clut
        //$gradient->setImageInterpolateMethod(\Imagick::INTERPOLATE_NEARESTNEIGHBOR);

        $imagick->clutImage(
            $gradient,
            \Imagick::CHANNEL_RGBA
        );

        $imagick->setImageFormat('png');

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
//Example end
    }
}
