<?php

namespace ImagickDemo\Example;


class fxAnalyzeImage extends \ImagickDemo\ExampleWithoutControl {

    function renderDescription() {
        
        return "";
//        echo "
//        
//        
//        u = first image in list
//     v = second image in list
//     s = current image in list (for %[fx:] otherwise = u)
//     t = index of current image (s) in list
//     n = number of images in list
//
//     i = column offset
//     j = row offset
//     p = pixel to use (absolute or relative to current pixel)
//
//     w = width of this image
//     h = height of this image
//     z = channel depth
//        
//        
//        ";

    }

    function renderImage() {

        
        $graphWidth = 256;
        $sampleHeight = 20;
        $graphHeight = 128;
        $border = 2;

        $imagick = new \Imagick();
        $imagick->newPseudoImage($graphWidth, 1, 'gradient:black-white');
        $arguments = array(9, -90);
        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);

        $imageIterator = new \ImagickPixelIterator($imagick);
        
        $reds = [];

        foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */
            foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
                /** @var $pixel \ImagickPixel */
                $color = $pixel->getColor();
                $reds[] = $color['r'];
            }
            $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
        }

        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel('red');
        $fillColor = new \ImagickPixel('red');
        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);
        $draw->setStrokeWidth(0);
        $draw->setFontSize(72);
        $draw->setStrokeAntiAlias(false);
        $previous = false;

        $x = 0;
        
        
 
        foreach ($reds as $red) {

            $pos = $red * $graphHeight / 256;
            
            if ($previous !== false) {
                $draw->line($x-1, $previous, $x, $pos);
            }
            $x += 1;
            $previous = $pos;
        }


        $plot = new \Imagick();
        $plot->newImage($graphWidth, $graphHeight, 'white');
        $plot->drawImage($draw);     

        $outputImage = new \Imagick();
        $outputImage->newImage($graphWidth, $graphHeight + $sampleHeight, 'white');
        $outputImage->compositeimage($plot, \Imagick::COMPOSITE_ATOP, 0, 0);
        
        $imagick->resizeimage($imagick->getImageWidth(), $sampleHeight, \Imagick::FILTER_LANCZOS, 1);

        $outputImage->compositeimage($imagick, \Imagick::COMPOSITE_ATOP, 0, $graphHeight);
        $outputImage->borderimage('black', $border, $border);

        $outputImage->setImageFormat("png");
        header("Content-Type: image/png");
        echo $outputImage;
    }
    



    function renderImage2() {
        $graph = new \Imagick();
        $graph->newPseudoImage(256, 256, "xc:pink");

        $imagick = new \Imagick();
        $imagick->newPseudoImage(256, 256, 'gradient:black-white');
        $arguments = array(9, -90);
        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);

        $graph->addImage($imagick);
        $fx = 'colorInt=int(256 * v.p{0,j}.lightness); pos=int(i); (int(pos) >= colorInt && int(pos) <= colorInt)';
        $fxImage = $graph->fxImage($fx);

        header("Content-Type: image/png");
        $fxImage->setimageformat('png');
        echo $fxImage->getImageBlob();
        
    }

    function renderImage3() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(10, 256, "gradient:white-black");
        //http://www.imagemagick.org/script/fx.php
        $fx = "(1.0/(1.0+exp(10.0*(0.5-u)))-0.006693)*1.0092503";
        //$fx = "1/2";
        $fx = "(1.0/(1.0+exp(10.0*(0.5-u)))-0.006693)*1.0092503";


//        p{0,0}.r     red value of the pixel in the upper left corner of the image
//        p{12,34}.b   blue pixel value at column number 12, row 34 of the image
        
//        p{0,j}.lightness;
//        
//        
        
        $fxImage = $imagick->fxImage($fx);
        header("Content-Type: image/jpg");
        $fxImage->setimageformat('jpg');
        echo $fxImage->getImageBlob();
    }

    //canvas:
//-fx 

//convert -size 80x80 xc: -channel G -fx  'sin((i-w/2)*(j-h/2)/w)/2+.5'\
//-separate fx_2d_gradient.gif



    
}