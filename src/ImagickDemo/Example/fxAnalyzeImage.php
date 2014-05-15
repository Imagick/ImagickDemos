<?php

namespace ImagickDemo\Example;


class fxAnalyzeImage extends \ImagickDemo\ExampleWithoutControl {

    function renderDescription() {
        echo "
        
        
        u = first image in list
     v = second image in list
     s = current image in list (for %[fx:] otherwise = u)
     t = index of current image (s) in list
     n = number of images in list

     i = column offset
     j = row offset
     p = pixel to use (absolute or relative to current pixel)

     w = width of this image
     h = height of this image
     z = channel depth
        
        
        ";

    }

    function renderImage() {

        $imagick = new \Imagick();
        $imagick->newPseudoImage(256, 1, 'gradient:black-white');
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
        $draw->setStrokeWidth(1);
        $draw->setFontSize(72);
        $previous = false;

        $x = 0;
 
        foreach ($reds as $red) {
            if ($previous !== false) {
                $draw->line($x-1, $previous, $x, $red);
            }
            $x += 1;
            $previous = $red;
        }

        $border = 0;

        $plot = new \Imagick();
        $plot->newImage(256, 256, 'white');
        $plot->drawImage($draw);     

        $outputImage = new \Imagick();
        $outputImage->newImage(256 + $border, 256 + $border + 10, 'white');

        $outputImage->compositeimage($plot, \Imagick::COMPOSITE_ATOP, $border, $border);

        $imagick->resizeimage($imagick->getImageWidth(), 10, \Imagick::FILTER_LANCZOS, 1);
        
        
        $outputImage->compositeimage($imagick, \Imagick::COMPOSITE_ATOP, $border, $border + 256);
        $outputImage->borderimage('black', 2, 2);


        $outputImage->setImageFormat("png");
        header("Content-Type: image/png");
        echo $outputImage;
    }
    

    /*
     
          //convert -size 100x100 xc:  -channel G \
//-fx  \
//-separate  fx_radial_gradient.png

//        "Xi=i-w/2; Yj=j-h/2; 1.2*(0.5-hypot(Xi,Yj)/70.0)+0.5"

        //min(v.p{0,j}.lightness, i)
    
    
    /usr/local/bin/convert -size 256x256 "xc:pink" input1.jpg
    /usr/local/bin/convert -size 256x256 "gradient:black-white" input2.jpg


    /usr/local/bin/convert input1.jpg input2.jpg -fx "colorInt=int(256 * v.p{0,j}.lightness); pos = int(256 * i/w); (int(pos) >= int(120) && int(pos) <= int(120))" output1.png

    /usr/local/bin/convert input1.jpg input2.jpg -fx "colorInt=int(256 * v.p{0,j}.lightness); pos = int(256 * i/w); int(pos) == int(120) " output2.png*/


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