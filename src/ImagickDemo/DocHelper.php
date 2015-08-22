<?php

namespace ImagickDemo;

class DocHelper {
    protected $exampleEntries = array (
  'imagick' => 
  array (
    'clutimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"clutImage";s:5:"lines";s:1765:"        // Make a shape
        $draw = new \\ImagickDraw();
        $draw->setStrokeOpacity(0);
        $draw->setFillColor(\'black\');
        $points = [
            [\'x\' => 40 * 3, \'y\' => 10 * 5],
            [\'x\' => 20 * 3, \'y\' => 20 * 5],
            [\'x\' => 70 * 3, \'y\' => 50 * 5],
            [\'x\' => 80 * 3, \'y\' => 15 * 5],
        ];
        $draw->polygon($points);
        $imagick = new \\Imagick();
        $imagick->newPseudoImage(
            300, 300,
            "xc:white"
        );

        $imagick->drawImage($draw);
        $imagick->blurImage(0, 10);

        //Make a gradient
        $draw = new \\ImagickDraw();
        $draw->setStrokeOpacity(0);
        $draw->setFillColor(\'red\');
        $draw->point(0, 2);
        $draw->setFillColor(\'yellow\');
        $draw->rectangle(0, 0, 1, 1);
        $gradient = new Imagick();
        $gradient->newPseudoImage(1, 5, \'xc:none\');
        $gradient->drawImage($draw);
        $gradient->setImageFormat(\'png\');

        //These two are needed for the clutImage to work reliably.
        $imagick->setImageAlphaChannel(\\Imagick::ALPHACHANNEL_DEACTIVATE);
        $imagick->transformImageColorspace(\\Imagick::COLORSPACE_GRAY);
        // $imagick->setImageInterpolateMethod(\\Imagick::INTERPOLATE_INTEGER);

        //Make the color lookup be smooth
        $gradient->setImageInterpolateMethod(\\Imagick::INTERPOLATE_BILINEAR);
        //Nearest neighbour uses exact color values from clut
        //$gradient->setImageInterpolateMethod(\\Imagick::INTERPOLATE_NEARESTNEIGHBOR);

        $imagick->clutImage(
            $gradient,
            \\Imagick::CHANNEL_RGBA
        );

        $imagick->setImageFormat(\'png\');

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:99;s:7:"endLine";i:151;}',
    ),
    'distortimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:474:"        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $points = array(
            0, 0,
            25, 25,
            100, 0,
            100, 50
        );

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\\Imagick::DISTORTION_AFFINE, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:6:"Affine";s:9:"startLine";i:72;s:7:"endLine";i:86;}',
      1 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:469:"        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $points = array(
            0.9, 0.3,
            -0.2, 0.7,
            20, 15
        );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\\Imagick::DISTORTION_AFFINEPROJECTION, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:10:"Projection";s:9:"startLine";i:92;s:7:"endLine";i:104;}',
      2 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:700:"        //Make some text arc around the center of it\'s image
//        convert logo: -resize x150 -gravity NorthEast -crop 100x100+10+0! \\
//        \\( -background none label:\'IM Examples\' \\
//        -virtual-pixel Background +distort Arc \'270 50 20\' \\
//        -repage +75+21\\! \\)  -flatten  arc_overlay.jpg

        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $degrees = array(180);
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\\Imagick::DISTORTION_ARC, $degrees, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:3:"Arc";s:9:"startLine";i:110;s:7:"endLine";i:124;}',
      3 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:401:"        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $degrees = array(180, 45, 100, 20);
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\\Imagick::DISTORTION_ARC, $degrees, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:11:"Rotated Arc";s:9:"startLine";i:130;s:7:"endLine";i:138;}',
      4 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:562:"        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $points = array(
            0, 0, 25, 25, # top left
            176, 0, 126, 0, # top right
            0, 135, 0, 105, # bottom right
            176, 135, 176, 135 # bottum left
        );
        $imagick->setImageBackgroundColor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\\Imagick::DISTORTION_BILINEAR, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:8:"Bilinear";s:9:"startLine";i:143;s:7:"endLine";i:156;}',
      5 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:464:"        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $points = array(
            1.5, # scale 150%
            150 # rotate
        );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\\Imagick::DISTORTION_SCALEROTATETRANSLATE, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:22:"Scale Rotate Transform";s:9:"startLine";i:162;s:7:"endLine";i:173;}',
      6 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:1192:"        //$imagick = new \\Imagick(realpath($this->rsiControl->getImagePath()));
        $imagick = new \\Imagick();

        /* Create new checkerboard pattern */
        $imagick->newPseudoImage(100, 100, "pattern:checkerboard");

        /* Set the image format to png */
        $imagick->setImageFormat(\'png\');

        /* Fill new visible areas with transparent */
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);

        /* Activate matte */
        $imagick->setImageMatte(true);

        /* Control points for the distortion */
        $controlPoints = array(10, 10,
            10, 5,

            10, $imagick->getImageHeight() - 20,
            10, $imagick->getImageHeight() - 5,

            $imagick->getImageWidth() - 10, 10,
            $imagick->getImageWidth() - 10, 20,

            $imagick->getImageWidth() - 10, $imagick->getImageHeight() - 10,
            $imagick->getImageWidth() - 10, $imagick->getImageHeight() - 30);

        /* Perform the distortion */
        $imagick->distortImage(\\Imagick::DISTORTION_PERSPECTIVE, $controlPoints, true);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
";s:11:"description";s:11:"Perspective";s:9:"startLine";i:179;s:7:"endLine";i:212;}',
      7 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:738:"        //X-of-destination = (sx*xs + ry+ys +tx) / (px*xs + py*ys +1)
        //Y-of-destination = (rx*xs + sy+ys +ty) / (px*xs + py*ys +1)

        // sx   ry   tx
        // rx   sy   ty
        // px   py

        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $points = array(
            1.945622, 0.071451,
            -12.187838, 0.799032,
            1.276214, -24.470275, 0.006258, 0.000715
        );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\\Imagick::DISTORTION_PERSPECTIVEPROJECTION, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:21:"PerspectiveProjection";s:9:"startLine";i:218;s:7:"endLine";i:237;}',
      8 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:1098:"
// Order     X1,Y1 I1,J1     X2,Y2 I2,J2     X3,Y3 I3,J3     X4,Y4 I4,J4 . . . .
// The \'Order\' argument is usually an integer from \'1\' onward, though a special value
// of \'1.5\' can also be used. This defines the \'order\' or complexity of the 2-dimensional
// mathematical equation (using both \'x\' and \'y\') , that will be applied.
// For example an order \'1\' polynomial will fit a equation of the form...
// Xd = 	 C2x*Xs + C1x*Ys + C0x	  ,      	Yd = 	 C2y*Xs + C1y*Ys + C0y 
// See also http://www.imagemagick.org/Usage/distorts/#polynomial

        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $points = array(
            1.5,   //Order 1.5 = special
            0, 0, 26, 0,
            128, 0, 114, 23,
            128, 128, 128, 100,
            0, 128, 0, 123
        );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\\Imagick::DISTORTION_POLYNOMIAL, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:10:"Polynomial";s:9:"startLine";i:242;s:7:"endLine";i:265;}',
      9 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:563:"        //v6.4.2-6
        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $points = array(
            0
        );

        //Only do partial arc
//        $points = array(
//            60,20, 0,0, -60,60
//        );

//        HorizontalTile

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_HORIZONTALTILE);
        $imagick->distortImage(\\Imagick::DISTORTION_POLAR, $points, true);

        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:5:"Polar";s:9:"startLine";i:273;s:7:"endLine";i:293;}',
      10 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:430:"        //v6.4.2-6
        $imagick = new \\Imagick(realpath($this->control->getImagePath()));
        $points = array(
            0
        );

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\\Imagick::DISTORTION_DEPOLAR, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:5:"Polar";s:9:"startLine";i:302;s:7:"endLine";i:314;}',
      11 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:1066:"
// The arguments needed for the \'Barrel\' distort method. Generally you supply
// 3 or 4 values only...
// A   B   C   [ D   [ X , Y ] ]
// The optional X,Y arguments provide an optional \'center\' for the radial distortion,
// otherwise it defaults to the exact center of the image given (regardless of its virtual offset).
// The coefficients are designed so that if all four A to D values, add up to \'1.0\', the minimal
// width/height of the image will not change. For this reason if D (which controls the overall
// scaling of the image) is not supplied it will be set so all four values do add up to \'1.0\'.

        $imagick = new \\Imagick(realpath($this->control->getImagePath()));

        $points = array(
            //0.2, 0.0, 0.0, 1.0
            0.4, 0.6, 0.0, 1.0
        );

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_EDGE);
        $imagick->distortImage(\\Imagick::DISTORTION_BARREL, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:6:"Barrel";s:9:"startLine";i:320;s:7:"endLine";i:343;}',
      12 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:634:"//  Rsrc = r / ( A*r3 + B*r2 + C*r + D )
// This equation does NOT produce the \'reverse\' the \'Barrel\' distortion.
// You can NOT use it to \'undo\' the previous distortion.

        $imagick = new \\Imagick(realpath($this->control->getImagePath()));

        $points = array(
            //0.2, 0.0, 0.0, 1.0
            0.2, 0.1, 0.0, 1.0
        );

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_EDGE);
        $imagick->distortImage(\\Imagick::DISTORTION_BARRELINVERSE, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:14:"Barrel Inverse";s:9:"startLine";i:349;s:7:"endLine";i:366;}',
      13 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"distortImage";s:5:"lines";s:1737:"        //The control points move points in the image in a taffy like motion
        $imagick = new \\Imagick(realpath($this->control->getImagePath()));

        $points = array(

            //Setup some control points that don\'t move
            5 * $imagick->getImageWidth() / 100, 5 * $imagick->getImageHeight() / 100,
            5 * $imagick->getImageWidth() / 100, 5 * $imagick->getImageHeight() / 100,

            5 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,
            5 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,

            95 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,
            95 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,

            5 * $imagick->getImageWidth() / 100, 5 * $imagick->getImageHeight() / 100,
            95 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,
//            //Move the centre of the image down and to the right
//            50 * $imagick->getImageWidth() / 100, 50 * $imagick->getImageHeight() / 100,
//            60 * $imagick->getImageWidth() / 100, 60 * $imagick->getImageHeight() / 100,
//
//            //Move a point near the top-right of the image down and to the left and down
//            90 * $imagick->getImageWidth(), 10 * $imagick->getImageHeight(),
//            80 * $imagick->getImageWidth(), 15 * $imagick->getImageHeight(),  
        );

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_EDGE);
        $imagick->distortImage(\\Imagick::DISTORTION_SHEPARDS, $points, true);
        header("Content-Type: image/jpeg");
        echo $imagick;
";s:11:"description";s:8:"Shepards";s:9:"startLine";i:372;s:7:"endLine";i:404;}',
    ),
    'functionimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"functionImage";s:5:"lines";s:800:"        $imagick = new \\Imagick();
        $imagick->newPseudoImage(500, 500, \'gradient:black-white\');
        $arguments = array(
            $this->control->getFirstTerm(),
        );

        $secondTerm = $this->control->getSecondTerm();
        $thirdTerm = $this->control->getThirdTerm();
        $fourthTerm = $this->control->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
                if (strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\\Imagick::FUNCTION_POLYNOMIAL, $arguments);
        $imagick->setimageformat(\'png\');

        analyzeImage($imagick, 512, 256);
";s:11:"description";s:10:"Polynomial";s:9:"startLine";i:108;s:7:"endLine";i:132;}',
      1 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"functionImage";s:5:"lines";s:798:"        $imagick = new \\Imagick();
        $imagick->newPseudoImage(500, 500, \'gradient:black-white\');
        $arguments = array(
            $this->control->getFirstTerm(),
        );

        $secondTerm = $this->control->getSecondTerm();
        $thirdTerm = $this->control->getThirdTerm();
        $fourthTerm = $this->control->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
                if (strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\\Imagick::FUNCTION_SINUSOID, $arguments);
        $imagick->setimageformat(\'png\');

        analyzeImage($imagick, 512, 256);
";s:11:"description";s:8:"Sinusoid";s:9:"startLine";i:140;s:7:"endLine";i:164;}',
      2 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"functionImage";s:5:"lines";s:796:"        $imagick = new \\Imagick();
        $imagick->newPseudoImage(500, 500, \'gradient:black-white\');
        $arguments = array(
            $this->control->getFirstTerm(),
        );

        $secondTerm = $this->control->getSecondTerm();
        $thirdTerm = $this->control->getThirdTerm();
        $fourthTerm = $this->control->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;
                if (strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\\Imagick::FUNCTION_ARCTAN, $arguments);
        $imagick->setimageformat(\'png\');

        analyzeImage($imagick, 512, 256);
";s:11:"description";s:6:"ArcTan";s:9:"startLine";i:169;s:7:"endLine";i:193;}',
      3 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"functionImage";s:5:"lines";s:797:"        $imagick = new \\Imagick();
        $imagick->newPseudoImage(500, 500, \'gradient:black-white\');
        $arguments = array(
            $this->control->getFirstTerm(),
        );

        $secondTerm = $this->control->getSecondTerm();
        $thirdTerm = $this->control->getThirdTerm();
        $fourthTerm = $this->control->getFourthTerm();
        if (strlen($secondTerm)) {
            $arguments[] = $secondTerm;
            if (strlen($thirdTerm)) {
                $arguments[] = $thirdTerm;

                if (strlen($fourthTerm)) {
                    $arguments[] = $fourthTerm;
                }
            }
        }

        $imagick->functionImage(\\Imagick::FUNCTION_ARCSIN, $arguments);
        $imagick->setimageformat(\'png\');

        analyzeImage($imagick, 512, 256);
";s:11:"description";s:7:"ArcSin ";s:9:"startLine";i:198;s:7:"endLine";i:223;}',
    ),
    'adaptiveblurimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:17:"adaptiveBlurImage";s:5:"lines";s:255:"function adaptiveBlurImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->adaptiveBlurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:45;s:7:"endLine";i:53;}',
    ),
    'adaptiveresizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:19:"adaptiveResizeImage";s:5:"lines";s:259:"function adaptiveResizeImage($imagePath, $width, $height, $bestFit)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->adaptiveResizeImage($width, $height, $bestFit);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:55;s:7:"endLine";i:63;}',
    ),
    'adaptivesharpenimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:20:"adaptiveSharpenImage";s:5:"lines";s:261:"function adaptiveSharpenImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->adaptiveSharpenImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:65;s:7:"endLine";i:73;}',
    ),
    'adaptivethresholdimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:22:"adaptiveThresholdImage";s:5:"lines";s:365:"function adaptiveThresholdImage($imagePath, $width, $height, $adaptiveOffset)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $adaptiveOffsetQuantum = intval($adaptiveOffset * \\Imagick::getQuantum());
    $imagick->adaptiveThresholdImage($width, $height, $adaptiveOffsetQuantum);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:75;s:7:"endLine";i:84;}',
    ),
    'addnoiseimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"addNoiseImage";s:5:"lines";s:237:"function addNoiseImage($noiseType, $imagePath, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->addNoiseImage($noiseType, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:86;s:7:"endLine";i:94;}',
    ),
    'affinetransformimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:20:"affineTransformImage";s:5:"lines";s:468:"function affineTransformImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $draw = new \\ImagickDraw();

    $angle = 40 ;

    $affineRotate = array(
        "sx" => cos($angle), "sy" => cos($angle),
        "rx" => sin($angle), "ry" => -sin($angle),
        "tx" => 0, "ty" => 0,
    );

    $draw->affine($affineRotate);

    $imagick->affineTransformImage($draw);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:97;s:7:"endLine";i:118;}',
    ),
    'annotateimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"annotateImage";s:5:"lines";s:572:"function annotateImage($imagePath, $strokeColor, $fillColor)
{
    $imagick = new \\Imagick(realpath($imagePath));

    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(1);
    $draw->setFontSize(36);
    
    $text = "Imagick is a native php \\nextension to create and \\nmodify images using the\\nImageMagick API.";

    $draw->setFont("../fonts/Arial.ttf");
    $imagick->annotateimage($draw, 40, 40, 0, $text);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:122;s:7:"endLine";i:142;}',
    ),
    'appendimages' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"appendImages";s:5:"lines";s:1185:"function appendImages()
{
    $images = [
        [
            "../imagick/images/lories/IMG_1599_480.jpg",
            "../imagick/images/lories/IMG_2561_480.jpg"
        ],
        [
            "../imagick/images/lories/IMG_2837_480.jpg",
            "../imagick/images/lories/IMG_4023_480.jpg"
        ]
    ];
    
    $canvas = new Imagick();

    foreach ($images as $imageRow) {
        $rowImagick = new Imagick();
        $rowImagick->setBackgroundColor(\'gray\');
        foreach ($imageRow as $imagePath) {
            $imagick = new Imagick(realpath($imagePath));
            $imagick->setImageBackgroundColor("gray");
            $imagick->resizeimage(200, 200, \\Imagick::FILTER_LANCZOS, 1.0, true);
            $rowImagick->addImage($imagick);
        }
        $rowImagick->resetIterator();
        //Add the images horizontally.
        $combinedRow = $rowImagick->appendImages(false);
        $canvas->addImage($combinedRow);
    }

    $canvas->resetIterator();
    
    //Add the images vertically.
    $finalimage = $canvas->appendImages(true);
    $finalimage->setImageFormat(\'jpg\');

    header("Content-Type: image/jpg");
    echo $finalimage->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:144;s:7:"endLine";i:184;}',
    ),
    'autolevelimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"autoLevelImage";s:5:"lines";s:197:"function autoLevelImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->autoLevelImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:186;s:7:"endLine";i:194;}',
    ),
    'averageimages' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"averageImages";s:5:"lines";s:445:"function averageImages($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    //$imagick2 = new \\Imagick(realpath("../images/TestImage2.jpg"));
    //$imagick->addImage($imagick2);
    //This kills PHP  - but the function is deprecated, so let\'s just ignore it
    $averageImage = @$imagick->averageImages();

    $averageImage->setImageType(\'jpg\');
    header("Content-Type: image/jpg");
    echo $averageImage->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:196;s:7:"endLine";i:209;}',
    ),
    'blackthresholdimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:19:"blackThresholdImage";s:5:"lines";s:239:"function blackThresholdImage($imagePath, $thresholdColor)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->blackthresholdimage($thresholdColor);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:211;s:7:"endLine";i:219;}',
    ),
    'blueshiftimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"blueShiftImage";s:5:"lines";s:219:"function blueShiftImage($imagePath, $blueShift)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->blueShiftImage($blueShift);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:221;s:7:"endLine";i:229;}',
    ),
    'blurimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"blurImage";s:5:"lines";s:239:"function blurImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->blurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:231;s:7:"endLine";i:239;}',
    ),
    'borderimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"borderImage";s:5:"lines";s:239:"function borderImage($imagePath, $color, $width, $height)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->borderImage($color, $width, $height);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:241;s:7:"endLine";i:249;}',
    ),
    'brightnesscontrastimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:23:"brightnessContrastImage";s:5:"lines";s:281:"function brightnessContrastImage($imagePath, $brightness, $contrast, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->brightnessContrastImage($brightness, $contrast, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:252;s:7:"endLine";i:260;}',
    ),
    'charcoalimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"charcoalImage";s:5:"lines";s:227:"function charcoalImage($imagePath, $radius, $sigma)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->charcoalImage($radius, $sigma);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:262;s:7:"endLine";i:270;}',
    ),
    'chopimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"chopImage";s:5:"lines";s:255:"function chopImage($imagePath, $startX, $startY, $width, $height)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->chopImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:272;s:7:"endLine";i:280;}',
    ),
    'clipimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"clipImage";s:5:"lines";s:187:"function clipImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->clipImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:282;s:7:"endLine";i:290;}',
    ),
    'coalesceimages' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"coalesceImages";s:5:"lines";s:765:"function coalesceImages()
{
    $imagePaths = [
        "../imagick/images/lories/IMG_1599_480.jpg",
        "../imagick/images/lories/IMG_2561_480.jpg",
        "../imagick/images/lories/IMG_2837_480.jpg",
        "../imagick/images/lories/IMG_4023_480.jpg",
    ];

    $canvas = new Imagick();
    foreach ($imagePaths as $imagePath) {
        $canvas->readImage(realpath($imagePath));
        $canvas->setImageDelay(100);
    }
    $canvas->setImageFormat(\'gif\');
    
    $finalImage = $canvas->coalesceImages();
    $finalImage->setImageFormat(\'gif\');
    $finalImage->setImageIterations(0); //loop forever
    $finalImage->mergeImageLayers(\\Imagick::LAYERMETHOD_OPTIMIZEPLUS);

    header("Content-Type: image/gif");
    echo $finalImage->getImagesBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:294;s:7:"endLine";i:319;}',
    ),
    'colordecisionlistimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:22:"colorDecisionListImage";s:5:"lines";s:656:"function colorDecisionListImage($imagePath)
{
    $colorList = \'<ColorCorrectionCollection xmlns="urn:ASC:CDL:v1.2">
    <ColorCorrection id="cc03345">
          <SOPNode>
               <Slope> 0.9 1.2 0.5 </Slope>
               <Offset> 0.4 -0.5 0.6 </Offset>
               <Power> 1.0 0.8 1.5 </Power>
          </SOPNode>
          <SATNode>
               <Saturation> 0.85 </Saturation>
          </SATNode>
    </ColorCorrection>
    </ColorCorrectionCollection>\';

    $imagick = new \\Imagick(realpath($imagePath));

    $imagick->colorDecisionListImage($imagick);
    
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:325;s:7:"endLine";i:348;}',
    ),
    'colorfloodfillimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:19:"colorFloodfillImage";s:5:"lines";s:363:"function colorFloodfillImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $border = new \\ImagickPixel(\'red\');
    $flood = new \\ImagickPixel(\'rgb(128, 32, 128)\');
    @$imagick->colorFloodfillImage(
        $flood,
        0,
        $border,
        5, 5
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:352;s:7:"endLine";i:367;}',
    ),
    'colorizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"colorizeImage";s:5:"lines";s:333:"function colorizeImage($imagePath, $color, $opacity)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $opacity = $opacity / 255.0;
    $opacityColor = new \\ImagickPixel("rgba(0, 0, 0, $opacity)");
    $imagick->colorizeImage($color, $opacityColor);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:369;s:7:"endLine";i:379;}',
    ),
    'colormatriximage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"colorMatrixImage";s:5:"lines";s:956:"function colorMatrixImage($imagePath, $colorMatrix)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->setImageOpacity(1);

    //A color matrix should look like:
    //    $colorMatrix = [
    //        1.5, 0.0, 0.0, 0.0, 0.0, -0.157,
    //        0.0, 1.0, 0.5, 0.0, 0.0, -0.157,
    //        0.0, 0.0, 1.5, 0.0, 0.0, -0.157,
    //        0.0, 0.0, 0.0, 1.0, 0.0,  0.0,
    //        0.0, 0.0, 0.0, 0.0, 1.0,  0.0,
    //        0.0, 0.0, 0.0, 0.0, 0.0,  1.0
    //    ];

    $background = new \\Imagick();
    $background->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "pattern:checkerboard"
    );

    $background->setImageFormat(\'png\');

    $imagick->setImageFormat(\'png\');
    $imagick->colorMatrixImage($colorMatrix);
    
    $background->compositeImage($imagick, \\Imagick::COMPOSITE_ATOP, 0, 0);

    header("Content-Type: image/png");
    echo $background->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:383;s:7:"endLine";i:416;}',
    ),
    'compositeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"compositeImage";s:5:"lines";s:770:"function compositeImage()
{
    $img1 = new \\Imagick();
    $img1->readImage(realpath("images/Biter_500.jpg"));

    $img2 = new \\Imagick();
    $img2->readImage(realpath("images/Skyline_400.jpg"));

    $img1->resizeimage(
        $img2->getImageWidth(),
        $img2->getImageHeight(),
        \\Imagick::FILTER_LANCZOS,
        1
    );

    $opacity = new \\Imagick();
    $opacity->newPseudoImage(
        $img1->getImageHeight(),
        $img1->getImageWidth(),
        "gradient:gray(10%)-gray(90%)"
    );
    $opacity->rotateimage(\'black\', 90);

    $img2->compositeImage($opacity, \\Imagick::COMPOSITE_COPYOPACITY, 0, 0);
    $img1->compositeImage($img2, \\Imagick::COMPOSITE_ATOP, 0, 0);

    header("Content-Type: image/jpg");
    echo $img1->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:418;s:7:"endLine";i:448;}',
    ),
    'constituteimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:15:"constituteImage";s:5:"lines";s:525:"function constituteImage($imagePath)
{
    $imagick = new \\Imagick();

    /*
    CharPixel
    DoublePixel
    FloatPixel
    IntegerPixel
    LongPixel
    QuantumPixel
    ShortPixel 
    */
//    R = red, G = green, B = blue, A = alpha (0 is transparent), O = opacity (0 is opaque), C = cyan, Y = yellow, M = magenta, K = black, I = intensity (for grayscale), P = pad.
    
    //$imagick->constituteImage(100, 100, "RGB", CharPixel, $pixels);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:452;s:7:"endLine";i:473;}',
    ),
    'contrastimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"contrastImage";s:5:"lines";s:264:"function contrastImage($imagePath, $contrastType)
{
    $imagick = new \\Imagick(realpath($imagePath));
    if ($contrastType != 2) {
        $imagick->contrastImage($contrastType);
    }

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:475;s:7:"endLine";i:486;}',
    ),
    'convolveimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"convolveImage";s:5:"lines";s:355:"function convolveImage($imagePath, $bias, $kernelMatrix)
{
    $imagick = new \\Imagick(realpath($imagePath));
    //$edgeFindingKernel = [-1, -1, -1, -1, 8, -1, -1, -1, -1,];
    $imagick->setImageBias($bias * \\Imagick::getQuantum());
    $imagick->convolveImage($kernelMatrix);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:488;s:7:"endLine";i:498;}',
    ),
    'cropimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"cropImage";s:5:"lines";s:255:"function cropImage($imagePath, $startX, $startY, $width, $height)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->cropImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:501;s:7:"endLine";i:509;}',
    ),
    'deskewimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"deskewImage";s:5:"lines";s:1283:"function deskewImage($threshold)
{
    $imagick = new \\Imagick(realpath("images/NYTimes-Page1-11-11-1918.jpg"));
    $deskewImagick = clone $imagick;
    
    //This is the only thing required for deskewing.
    $deskewImagick->deskewImage($threshold);

    //The rest of this example is to make the result obvious - because
    //otherwise the result is not obvious.
    $trim = 9;

    $deskewImagick->cropImage($deskewImagick->getImageWidth() - $trim, $deskewImagick->getImageHeight(), $trim, 0);
    $imagick->cropImage($imagick->getImageWidth() - $trim, $imagick->getImageHeight(), $trim, 0);
    $deskewImagick->resizeimage($deskewImagick->getImageWidth() / 2, $deskewImagick->getImageHeight() / 2, \\Imagick::FILTER_LANCZOS, 1);
    $imagick->resizeimage($imagick->getImageWidth() / 2, $imagick->getImageHeight() / 2, \\Imagick::FILTER_LANCZOS, 1);
    $newCanvas = new \\Imagick();
    $newCanvas->newimage($imagick->getImageWidth() + $deskewImagick->getImageWidth() + 20, $imagick->getImageHeight(), \'red\', \'jpg\');
    $newCanvas->compositeimage($imagick, \\Imagick::COMPOSITE_COPY, 5, 0);
    $newCanvas->compositeimage($deskewImagick, \\Imagick::COMPOSITE_COPY, $imagick->getImageWidth() + 10, 0);

    header("Content-Type: image/jpg");
    echo $newCanvas->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:512;s:7:"endLine";i:537;}',
    ),
    'despeckleimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"despeckleImage";s:5:"lines";s:197:"function despeckleImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->despeckleImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:539;s:7:"endLine";i:547;}',
    ),
    'drawimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"drawImage";s:5:"lines";s:727:"function drawImage()
{
    $strokeColor = \'black\';
    $fillColor = \'salmon\';
    $backgroundColor = \'lightblue\';
    
    $draw = new \\ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeWidth(4);

    $draw->setFillColor($fillColor);

    $points = [
        [\'x\' => 40 * 5, \'y\' => 10 * 5],
        [\'x\' => 20 * 5, \'y\' => 20 * 5],
        [\'x\' => 70 * 5, \'y\' => 50 * 5],
        [\'x\' => 60 * 5, \'y\' => 15 * 5],
    ];

    $draw->polygon($points);

    $image = new \\Imagick();
    $image->newImage(500, 300, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:549;s:7:"endLine";i:581;}',
    ),
    'edgeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"edgeImage";s:5:"lines";s:203:"function edgeImage($imagePath, $radius)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->edgeImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:583;s:7:"endLine";i:591;}',
    ),
    'enhanceimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"enhanceImage";s:5:"lines";s:193:"function enhanceImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->enhanceImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:593;s:7:"endLine";i:601;}',
    ),
    'embossimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"embossImage";s:5:"lines";s:223:"function embossImage($imagePath, $radius, $sigma)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->embossImage($radius, $sigma);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:604;s:7:"endLine";i:612;}',
    ),
    'equalizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"equalizeImage";s:5:"lines";s:195:"function equalizeImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->equalizeImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:614;s:7:"endLine";i:622;}',
    ),
    'evaluateimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"evaluateImage";s:5:"lines";s:1802:"function evaluateImage($evaluateType, $firstTerm, $gradientStartColor, $gradientEndColor)
{
    $imagick = new \\Imagick();
    $size = 400;
    $imagick->newPseudoImage(
        $size,
        $size,
        "gradient:$gradientStartColor-$gradientEndColor"
    );
    
    $quantumScaledTypes = [
        \\Imagick::EVALUATE_ADD,
        \\Imagick::EVALUATE_AND,
        \\Imagick::EVALUATE_MAX,
        \\Imagick::EVALUATE_MIN,
        \\Imagick::EVALUATE_OR,
        \\Imagick::EVALUATE_SET,
        \\Imagick::EVALUATE_SUBTRACT,
        \\Imagick::EVALUATE_XOR,
        \\Imagick::EVALUATE_THRESHOLD,
        \\Imagick::EVALUATE_THRESHOLDBLACK,
        \\Imagick::EVALUATE_THRESHOLDWHITE,
        \\Imagick::EVALUATE_ADDMODULUS,
    ];

    $unscaledTypes = [
        \\Imagick::EVALUATE_DIVIDE,
        \\Imagick::EVALUATE_MULTIPLY,
        \\Imagick::EVALUATE_RIGHTSHIFT,
        \\Imagick::EVALUATE_LEFTSHIFT,
        \\Imagick::EVALUATE_POW,
        \\Imagick::EVALUATE_LOG,
        \\Imagick::EVALUATE_GAUSSIANNOISE,
        \\Imagick::EVALUATE_IMPULSENOISE,
        \\Imagick::EVALUATE_LAPLACIANNOISE,
        \\Imagick::EVALUATE_MULTIPLICATIVENOISE,
        \\Imagick::EVALUATE_POISSONNOISE,
        \\Imagick::EVALUATE_UNIFORMNOISE,
        \\Imagick::EVALUATE_COSINE,
        \\Imagick::EVALUATE_SINE,
    ];

    if (in_array($evaluateType, $unscaledTypes)) {
        $imagick->evaluateimage($evaluateType, $firstTerm);
    }
    else if (in_array($evaluateType, $quantumScaledTypes)) {
        $imagick->evaluateimage($evaluateType, $firstTerm * \\Imagick::getQuantum());
    }
    else {
        throw new \\Exception("Evaluation type $evaluateType is not listed as either scaled or unscaled");
    }

    $imagick->setimageformat(\'png\');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:625;s:7:"endLine";i:682;}',
    ),
    'extentimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"extentImage";s:5:"lines";s:344:"function extentImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->setImageBackgroundColor(\'orange\');
    $imagick->extentImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        -100,
        -100
    );

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:686;s:7:"endLine";i:701;}',
    ),
    'exportimagepixels' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:17:"exportImagePixels";s:5:"lines";s:756:"function exportImagePixels($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    for ($y=0; $y< $imagick->getImageHeight(); $y++) {
        $redPixels = $imagick->exportImagePixels(0, $y, $imagick->getImageWidth(), 1, "R", \\Imagick::PIXEL_CHAR);
        
        $average = array_sum($redPixels) / count($redPixels);

        
        //Make the pixels that are redder than average be 100% red.
        foreach ($redPixels as &$redPixel) {
            if ($redPixel > $average) {
                $redPixel = 255;
            }
        }
        
        $imagick->importImagePixels(0, $y, $imagick->getImageWidth(), 1, "R", \\Imagick::PIXEL_CHAR, $redPixels);
    }
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:704;s:7:"endLine";i:726;}',
    ),
    'flattenimages' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"flattenImages";s:5:"lines";s:234:"function flattenImages()
{
    $imagick = new \\Imagick(realpath("images/LayerTest.psd"));
    $imagick->flattenimages();
    $imagick->setImageFormat(\'png\');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:729;s:7:"endLine";i:738;}',
    ),
    'filter' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:6:"filter";s:5:"lines";s:461:"function filter($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $matrix = [
        [-1, 0, -1],
        [0,  5,  0],
        [-1, 0, -1],
    ];
    
    $kernel = \\ImagickKernel::fromMatrix($matrix);
    $strength = 0.5;
    $kernel->scale($strength, \\Imagick::NORMALIZE_KERNEL_VALUE);
    $kernel->addUnityKernel(1 - $strength);

    $imagick->filter($kernel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:740;s:7:"endLine";i:759;}',
    ),
    'flipimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"flipImage";s:5:"lines";s:187:"function flipImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->flipImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:763;s:7:"endLine";i:771;}',
    ),
    'floodfillpaintimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:19:"floodFillPaintImage";s:5:"lines";s:407:"function floodFillPaintImage($fillColor, $fuzz, $targetColor, $x, $y, $inverse, $channel)
{
    $imagick = new \\Imagick(realpath("images/BlueScreen.jpg"));
    $imagick->floodFillPaintImage(
        $fillColor,
        $fuzz * \\Imagick::getQuantum(),
        $targetColor,
        $x, $y,
        $inverse,
        $channel
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:774;s:7:"endLine";i:789;}',
    ),
    'flopimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"flopImage";s:5:"lines";s:187:"function flopImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->flopImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:792;s:7:"endLine";i:800;}',
    ),
    'forwardfouriertransformimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:28:"forwardFourierTransformImage";s:5:"lines";s:1436:"//Utility function for forwardTransformImage
function createMask()
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeOpacity(0);
    $draw->setStrokeColor(\'rgb(255, 255, 255)\');
    $draw->setFillColor(\'rgb(255, 255, 255)\');

    //Draw a circle on the y-axis, with it\'s centre
    //at x, y that touches the origin
    $draw->circle(250, 250, 220, 250);

    $imagick = new \\Imagick();
    $imagick->newImage(512, 512, "black");
    $imagick->drawImage($draw);
    $imagick->gaussianBlurImage(20, 20);
    $imagick->autoLevelImage();

    return $imagick;
}


function forwardFourierTransformImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->resizeimage(512, 512, \\Imagick::FILTER_LANCZOS, 1);

    $mask = createMask();
    $imagick->forwardFourierTransformImage(true);

    @$imagick->setimageindex(0);
    $magnitude = $imagick->getimage();

    @$imagick->setimageindex(1);
    $imagickPhase = $imagick->getimage();

    if (true) {
        $imagickPhase->compositeImage($mask, \\Imagick::COMPOSITE_MULTIPLY, 0, 0);
    }

    if (false) {
        $output = clone $imagickPhase;
        $output->setimageformat(\'png\');
        header("Content-Type: image/png");
        echo $output->getImageBlob();
    }

    $magnitude->inverseFourierTransformImage($imagickPhase, true);

    $magnitude->setimageformat(\'png\');
    header("Content-Type: image/png");
    echo $magnitude->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:802;s:7:"endLine";i:857;}',
    ),
    'frameimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"frameImage";s:5:"lines";s:437:"function frameImage($imagePath, $color, $width, $height, $innerBevel, $outerBevel)
{
    $imagick = new \\Imagick(realpath($imagePath));

    $width = $width + $innerBevel + $outerBevel;
    $height = $height + $innerBevel + $outerBevel;

    $imagick->frameimage(
        $color,
        $width,
        $height,
        $innerBevel,
        $outerBevel
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:860;s:7:"endLine";i:878;}',
    ),
    'fximage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:7:"fxImage";s:5:"lines";s:327:"function fxImage()
{
    $imagick = new \\Imagick();
    $imagick->newPseudoImage(200, 200, "xc:white");

    $fx = \'xx=i-w/2; yy=j-h/2; rr=hypot(xx,yy); (.5-rr/140)*1.2+.5\';
    $fxImage = $imagick->fxImage($fx);

    header("Content-Type: image/png");
    $fxImage->setimageformat(\'png\');
    echo $fxImage->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:882;s:7:"endLine";i:895;}',
    ),
    'gammaimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"gammaImage";s:5:"lines";s:223:"function gammaImage($imagePath, $gamma, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->gammaImage($gamma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:898;s:7:"endLine";i:906;}',
    ),
    'gaussianblurimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:17:"gaussianBlurImage";s:5:"lines";s:255:"function gaussianBlurImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->gaussianBlurImage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:909;s:7:"endLine";i:917;}',
    ),
    'getimagegeometry' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"getImageGeometry";s:5:"lines";s:167:"function getImageGeometry($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:920;s:7:"endLine";i:927;}',
    ),
    'getpixeliterator' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"getPixelIterator";s:5:"lines";s:745:"function getPixelIterator($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelIterator();

    /** @noinspection PhpUnusedLocalVariableInspection */
    foreach ($imageIterator as $row => $pixels) { /* Loop through pixel rows */
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \\ImagickPixel */
            if ($column % 2) {
                $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}
";s:11:"description";s:0:"";s:9:"startLine";i:929;s:7:"endLine";i:949;}',
    ),
    'getimagehistogram' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:17:"getImageHistogram";s:5:"lines";s:2510:"function getColorStatistics($histogramElements, $colorChannel)
{
    $colorStatistics = [];

    foreach ($histogramElements as $histogramElement) {
        $color = $histogramElement->getColorValue($colorChannel);
        $color = intval($color * 255);
        $count = $histogramElement->getColorCount();

        if (array_key_exists($color, $colorStatistics)) {
            $colorStatistics[$color] += $count;
        }
        else {
            $colorStatistics[$color] = $count;
        }
    }

    ksort($colorStatistics);
    
    return $colorStatistics;
}

function getImageHistogram($imagePath)
{
    $backgroundColor = \'black\';

    $draw = new \\ImagickDraw();
    $draw->setStrokeWidth(0); //make the lines be as thin as possible

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    $histogramWidth = 256;
    $histogramHeight = 100; // the height for each RGB segment

    $imagick = new \\Imagick(realpath($imagePath));
    //Resize the image to be small, otherwise PHP tends to run out of memory
    //This might lead to bad results for images that are pathologically \'pixelly\'
    $imagick->adaptiveResizeImage(200, 200, true);
    $histogramElements = $imagick->getImageHistogram();

    $histogram = new \\Imagick();
    $histogram->newpseudoimage($histogramWidth, $histogramHeight * 3, \'xc:black\');
    $histogram->setImageFormat(\'png\');

    $getMax = function ($carry, $item) {
        if ($item > $carry) {
            return $item;
        }
        return $carry;
    };

    $colorValues = [
        \'red\' => getColorStatistics($histogramElements, \\Imagick::COLOR_RED),
        \'lime\' => getColorStatistics($histogramElements, \\Imagick::COLOR_GREEN),
        \'blue\' => getColorStatistics($histogramElements, \\Imagick::COLOR_BLUE),
    ];

    $max = array_reduce($colorValues[\'red\'], $getMax, 0);
    $max = array_reduce($colorValues[\'lime\'], $getMax, $max);
    $max = array_reduce($colorValues[\'blue\'], $getMax, $max);

    $scale =  $histogramHeight / $max;

    $count = 0;
    foreach ($colorValues as $color => $values) {
        $draw->setstrokecolor($color);

        $offset = ($count + 1) * $histogramHeight;

        foreach ($values as $index => $value) {
            $draw->line($index, $offset, $index, $offset - ($value * $scale));
        }
        $count++;
    }

    $histogram->drawImage($draw);

    header("Content-Type: image/png");
    echo $histogram;
}
";s:11:"description";s:0:"";s:9:"startLine";i:953;s:7:"endLine";i:1037;}',
    ),
    'getpixelregioniterator' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:22:"getPixelRegionIterator";s:5:"lines";s:775:"function getPixelRegionIterator($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelRegionIterator(100, 100, 200, 200);

    /** @noinspection PhpUnusedLocalVariableInspection */
    foreach ($imageIterator as $row => $pixels) { /* Loop through pixel rows */
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \\ImagickPixel */
            if ($column % 2) {
                $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}
";s:11:"description";s:0:"";s:9:"startLine";i:1040;s:7:"endLine";i:1060;}',
    ),
    'haldclutimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"haldClutImage";s:5:"lines";s:323:"function haldClutImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagickPalette = new \\Imagick(realpath("images/hald/hald_8.png"));
    $imagickPalette->sepiatoneImage(55);
    $imagick->haldClutImage($imagickPalette);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1062;s:7:"endLine";i:1072;}',
    ),
    'implodeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"implodeImage";s:5:"lines";s:200:"function implodeImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->implodeImage(0.0001);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

}
";s:11:"description";s:0:"";s:9:"startLine";i:1075;s:7:"endLine";i:1084;}',
    ),
    'importimagepixels' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:17:"importImagePixels";s:5:"lines";s:1949:"
function shadePixel($value, $r, $g, $b)
{
    $result = [];
    $result[] = intval($r * $value / 64);
    $result[] = intval($g * $value / 64);
    $result[] = intval($b * $value / 64);

    return $result;
}


function importImagePixels()
{
    $width = 320;
    $height = 200;
    //$imagick = new \\Imagick();

    $imagick = new \\Imagick();//;"magick:logo");


    for ($loop = 0; $loop<=255; $loop += 8) {
        $frame = new \\Imagick();
        $frame->newPseudoImage($width, $height, "xc:black");
        //$frame->setImageFormat(\'gif\');

        for ($y=0; $y<$height; $y++) {
            $pixels = [];
    
            for ($x = 0; $x < $width; $x++) {
                $pos = sqrt(($x * $x) + ($y * $y));
                $pos = (256 + $pos - $loop) % 256;
    
                if ($pos < 64) {
                    $rgbColor = shadePixel($pos, 255, 0, 0);
                }
                else if ($pos < 128) {
                    $rgbColor = shadePixel($pos - 64, 0, 255, 0);
                }
                else if ($pos < 192) {
                    $rgbColor = shadePixel($pos - 128, 0, 0, 255);
                }
                else {
                    $rgbColor = shadePixel($pos - 192, 255, 0, 255);
                }
    
                list($r, $g, $b) = $rgbColor;
                $pixels[] = $r;
                $pixels[] = $g;
                $pixels[] = $b;
            }
    
            $frame->importImagePixels(
                0, $y,
                320, 1,
                "RGB",
                \\Imagick::PIXEL_CHAR,
                $pixels
            );
        }

        $imagick->addImage($frame);
        $imagick->setImageFormat(\'gif\');
        $imagick->setImageDelay(3);
    }

    $imagick->setImageFormat(\'gif\');
    $imagick->mergeImageLayers(\\Imagick::LAYERMETHOD_OPTIMIZEIMAGE);
    header("Content-Type: image/gif");
    $imagick->setImageIterations(0);
    
    echo $imagick->getImagesBlob();

}
";s:11:"description";s:0:"";s:9:"startLine";i:1086;s:7:"endLine";i:1161;}',
    ),
    'labelimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"labelImage";s:5:"lines";s:208:"function labelImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->labelImage("This is some text");
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1163;s:7:"endLine";i:1171;}',
      1 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"labelImage";s:5:"lines";s:250:"function polaroidImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagickDraw = new \\ImagickDraw();
    $imagick->polaroidImage($imagickDraw, 15);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1482;s:7:"endLine";i:1491;}',
    ),
    'levelimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"levelImage";s:5:"lines";s:383:"function levelImage($blackPoint, $gamma, $whitePoint)
{
    $imagick = new \\Imagick();
    $imagick->newPseudoimage(500, 500, \'gradient:black-white\');

    $imagick->setFormat(\'png\');
    $quantum = $imagick->getQuantum();
    $imagick->levelImage($blackPoint / 100, $gamma, $quantum * $whitePoint / 100);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1174;s:7:"endLine";i:1187;}',
    ),
    'linearstretchimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:18:"linearStretchImage";s:5:"lines";s:362:"function linearStretchImage($imagePath, $blackThreshold, $whiteThreshold)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $pixels = $imagick->getImageWidth() * $imagick->getImageHeight();
    $imagick->linearStretchImage($blackThreshold * $pixels, $whiteThreshold * $pixels);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1190;s:7:"endLine";i:1200;}',
    ),
    'magnifyimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"magnifyImage";s:5:"lines";s:193:"function magnifyImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->magnifyImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1203;s:7:"endLine";i:1211;}',
    ),
    'medianfilterimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:17:"medianFilterImage";s:5:"lines";s:220:"function medianFilterImage($radius, $imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    @$imagick->medianFilterImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1214;s:7:"endLine";i:1222;}',
    ),
    'mergeimagelayers' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"mergeImageLayers";s:5:"lines";s:776:"function mergeImageLayers($layerMethodType)
{
    //$imagick = new \\Imagick(realpath("images/LayerTest.psd"));
    $imagick = new \\Imagick(realpath("../imagick/images/Biter_500.jpg"));
    
    
//    
//    $imagick = new \\Imagick();
//    $whiteDisc = new \\Imagick(realpath("../imagick/images/blueDiscAlpha.png"));
//    $imagick->addImage($whiteDisc);
//    
//    $whiteDisc = new \\Imagick(realpath("../imagick/images/redDiscAlpha.png"));
//    $imagick->addImage($whiteDisc);
    
    $whiteDisc = new \\Imagick(realpath("../imagick/images/greenDiscAlpha.png"));
    $imagick->addImage($whiteDisc);
    $imagick->setImageFormat(\'png\');

    $result = $imagick->mergeImageLayers($layerMethodType);
    header("Content-Type: image/png");
    echo $result->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1224;s:7:"endLine";i:1247;}',
    ),
    'modulateimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"modulateImage";s:5:"lines";s:257:"function modulateImage($imagePath, $hue, $brightness, $saturation)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->modulateImage($brightness, $saturation, $hue);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1250;s:7:"endLine";i:1258;}',
    ),
    'montageimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"montageImage";s:5:"lines";s:1092:"function montageImage($montageType)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor(\'black\');
    $draw->setFillColor(\'white\');
 
    $draw->setStrokeWidth(1);
    $draw->setFontSize(24);

    $imagick = new \\Imagick();

    $mosaicWidth = 500;
    $mosaicHeight = 500;
    
    $imagick->newimage($mosaicWidth, $mosaicHeight, \'red\');

    $images = [
        "../imagick/images/Biter_500.jpg",
        "../imagick/images/SydneyPeople_400.jpg",
        "../imagick/images/Skyline_400.jpg",
    ];

    $count = 0;
    
    foreach ($images as $image) {
        $nextImage = new \\Imagick(realpath($image));
        
        $count++;
        
        $nextImage->labelImage("Label $count");
        $imagick->addImage($nextImage);
    }

    $montage = $imagick->montageImage(
        $draw,
        "3x2+0+0", //tile_geometry
        "200x160+3+3>", //thumbnail_geometry
        $montageType, //\\Imagick::MONTAGEMODE_CONCATENATE,
        "10x10+2+2"
    );
    
    $montage->setImageFormat(\'png\');
    
    header("Content-Type: image/png");
    echo $montage->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1261;s:7:"endLine";i:1308;}',
    ),
    'morphimages' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"morphImages";s:5:"lines";s:750:"function morphImages()
{
    $images = [
        //"../imagick/images/lories/IMG_1599_480.jpg",
        //"../imagick/images/lories/IMG_2837_480.jpg",
        "../imagick/images/lories/IMG_1599_480.jpg",
        "../imagick/images/lories/6E6F9109_480.jpg",
        "../imagick/images/lories/IMG_2561_480.jpg",
    ];

    $imagick = new \\Imagick(realpath($images[count($images) - 1]));

    foreach ($images as $image) {
        $nextImage = new \\Imagick(realpath($image));
        $imagick->addImage($nextImage);
    }

    $imagick->resetIterator();
    $morphed = $imagick->morphImages(5);
    $morphed->setImageTicksPerSecond(10);

    header("Content-Type: image/gif");
    $morphed->setImageFormat(\'gif\');
    echo $morphed->getImagesBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1310;s:7:"endLine";i:1336;}',
    ),
    'mosaicimages' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"mosaicImages";s:5:"lines";s:1120:"function mosaicImages()
{
    $imagick = new \\Imagick();
    $mosaicWidth = 500;
    $mosaicHeight = 500;
    
    $imagick->newimage($mosaicWidth, $mosaicHeight, \'red\');

    $images = [
        "../imagick/images/Biter_500.jpg",
        "../imagick/images/SydneyPeople_400.jpg",
        "../imagick/images/Skyline_400.jpg",
    ];

    $positions = [
        [50, 300],
        [200, 125],
        [25, 50],
    ];
    
    $count = 0;

    foreach ($images as $image) {
        $nextImage = new \\Imagick(realpath($image));
        $nextImage->resizeimage(300, 300, \\Imagick::FILTER_LANCZOS, 1.0, true);

        $nextImage->setImagePage(
            $nextImage->getImageWidth(),
            $nextImage->getImageHeight(),
            $positions[$count][0],
            $positions[$count][1]
        );
        
        $imagick->addImage($nextImage);
        $count++;
    }

    $result = $imagick->mosaicImages();
    $result->setImageFormat(\'png\');

    $result->cropImage(
        $mosaicWidth,
        $mosaicHeight,
        0, 0
    );

    header("Content-Type: image/png");
    echo $result->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1338;s:7:"endLine";i:1388;}',
    ),
    'motionblurimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:15:"motionBlurImage";s:5:"lines";s:267:"function motionBlurImage($imagePath, $radius, $sigma, $angle, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->motionBlurImage($radius, $sigma, $angle, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1391;s:7:"endLine";i:1399;}',
    ),
    'negateimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"negateImage";s:5:"lines";s:231:"function negateImage($imagePath, $grayOnly, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->negateImage($grayOnly, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1401;s:7:"endLine";i:1409;}',
    ),
    'newpseudoimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"newPseudoImage";s:5:"lines";s:236:"function newPseudoImage($canvasType)
{
    $imagick = new \\Imagick();
    $imagick->newPseudoImage(300, 300, $canvasType);
    $imagick->setImageFormat("png");
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1412;s:7:"endLine";i:1421;}',
    ),
    'normalizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"normalizeImage";s:5:"lines";s:413:"function normalizeImage($imagePath, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $original = clone $imagick;
    $original->cropimage($original->getImageWidth() / 2, $original->getImageHeight(), 0, 0);
    $imagick->normalizeImage($channel);
    $imagick->compositeimage($original, \\Imagick::COMPOSITE_ATOP, 0, 0);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1424;s:7:"endLine";i:1435;}',
    ),
    'oilpaintimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"oilPaintImage";s:5:"lines";s:211:"function oilPaintImage($imagePath, $radius)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->oilPaintImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1437;s:7:"endLine";i:1445;}',
    ),
    'orderedposterizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:21:"orderedPosterizeImage";s:5:"lines";s:297:"function orderedPosterizeImage($imagePath, $orderedPosterizeType)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->orderedPosterizeImage($orderedPosterizeType);
    $imagick->setImageFormat(\'png\');
    
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1448;s:7:"endLine";i:1458;}',
    ),
    'opaquepaintimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"opaquePaintImage";s:5:"lines";s:510:"function opaquePaintImage($color, $replacementColor, $fuzz, $inverse)
{
    $imagick = new \\Imagick(realpath("images/BlueScreen.jpg"));

    //Need to be in a format that supports transparency
    $imagick->setimageformat(\'png\');

    $imagick->opaquePaintImage(
        $color, $replacementColor, $fuzz * \\Imagick::getQuantum(), $inverse
    );
    //Not required, but helps tidy up left over pixels
    $imagick->despeckleimage();

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1462;s:7:"endLine";i:1479;}',
    ),
    'posterizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"posterizeImage";s:5:"lines";s:294:"function posterizeImage($imagePath, $posterizeType, $numberLevels)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->posterizeImage($numberLevels, $posterizeType);
    $imagick->setImageFormat(\'png\');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1495;s:7:"endLine";i:1504;}',
    ),
    'quantizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"quantizeImage";s:5:"lines";s:335:"function quantizeImage($imagePath, $numberColors, $colorSpace, $treeDepth, $dither)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->quantizeImage($numberColors, $colorSpace, $treeDepth, $dither, false);
    $imagick->setImageFormat(\'png\');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1507;s:7:"endLine";i:1516;}',
    ),
    'quantizeimages' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"quantizeImages";s:5:"lines";s:986:"function quantizeImages($numberColors, $colorSpace, $treeDepth, $dither)
{
    set_time_limit(120);        //This takes a long time
    ini_set(\'memory_limit\', \'128M\'); //And uses a lot of memory
    
    $imagePathPattern = "../imagick/images/spiderGif";
    $fileIterator = new \\GlobIterator(realpath($imagePathPattern).\'/*.png\');

    $imagick = new \\Imagick();
    $imagick->setFormat("gif");
    $count = 0;
    foreach ($fileIterator as $fileEntry) {
        if ((($count++) % 3) != 0) {
            continue;
        }
        $nextImage = new \\Imagick(realpath($fileEntry));
        $nextImage->setImageDelay(5);
        $imagick->addImage($nextImage);
        $nextImage->destroy();
    }

    $imagick->quantizeImages($numberColors, $colorSpace, $treeDepth, $dither, false);
  
    $imagick->setImageIterations(0); //loop forever
    $imagick->mergeImageLayers(\\Imagick::LAYERMETHOD_OPTIMIZEPLUS);

    header("Content-Type: image/gif");
    echo $imagick->getImagesBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1519;s:7:"endLine";i:1549;}',
    ),
    'radialblurimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:15:"radialBlurImage";s:5:"lines";s:268:"function radialBlurImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->radialBlurImage(3);
    $imagick->radialBlurImage(5);
    $imagick->radialBlurImage(7);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1554;s:7:"endLine";i:1564;}',
    ),
    'raiseimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"raiseImage";s:5:"lines";s:280:"function raiseImage($imagePath, $width, $height, $x, $y, $raise)
{
    $imagick = new \\Imagick(realpath($imagePath));

    //x and y do nothing?
    $imagick->raiseImage($width, $height, $x, $y, $raise);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1567;s:7:"endLine";i:1577;}',
    ),
    'randomthresholdimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:20:"randomThresholdimage";s:5:"lines";s:370:"function randomThresholdimage($imagePath, $lowThreshold, $highThreshold, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));

    $imagick->randomThresholdimage(
        $lowThreshold * \\Imagick::getQuantum(),
        $highThreshold * \\Imagick::getQuantum(),
        $channel
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1580;s:7:"endLine";i:1593;}',
    ),
    'readimageblob' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"readImageBlob";s:5:"lines";s:887:"function readImageBlob()
{
    // Image blob borrowed from:
    // http://www.techerator.com/2011/12/how-to-embed-images-directly-into-your-html/
    $base64 = "iVBORw0KGgoAAAANSUhEUgAAAM0AAAD
 NCAMAAAAsYgRbAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5c
 cllPAAAABJQTFRF3NSmzMewPxIG//ncJEJsldTou1jHgAAAARBJREFUeNrs2EEK
 gCAQBVDLuv+V20dENbMY831wKz4Y/VHb/5RGQ0NDQ0NDQ0NDQ0NDQ0NDQ
 0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0PzMWtyaGhoaGhoaGhoaGhoaGhoxtb0QGho
 aGhoaGhoaGhoaGhoaMbRLEvv50VTQ9OTQ5OpyZ01GpM2g0bfmDQaL7S+ofFC6x
 v3ZpxJiywakzbvd9r3RWPS9I2+MWk0+kbf0Hih9Y17U0nTHibrDDQ0NDQ0NDQ0
 NDQ0NDQ0NTXbRSL/AK72o6GhoaGhoRlL8951vwsNDQ0NDQ1NDc0WyHtDTEhD
 Q0NDQ0NTS5MdGhoaGhoaGhoaGhoaGhoaGhoaGhoaGposzSHAAErMwwQ2HwRQ
 AAAAAElFTkSuQmCC";

    $imageBlob = base64_decode($base64);

    $imagick = new Imagick();
    $imagick->readImageBlob($imageBlob);

    header("Content-Type: image/png");
    echo $imageBlob;
}
";s:11:"description";s:0:"";s:9:"startLine";i:1595;s:7:"endLine";i:1619;}',
    ),
    'recolorimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"recolorImage";s:5:"lines";s:427:"function recolorImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $remapColor = [ 1, 0, 0,
        0, 0, 1,
        0, 1, 0,];

//$remapColor = [
//    1.438, -0.122, -0.016,  0, 0, -0.03,
//    -0.062,  1.378, -0.016,  0, 0,  0.05,
//    -0.062, -0.122, 1.483,   0, 0, -0.02,
//];

    @$imagick->recolorImage($remapColor);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1621;s:7:"endLine";i:1640;}',
    ),
    'reducenoiseimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"reduceNoiseImage";s:5:"lines";s:228:"function reduceNoiseImage($imagePath, $reduceNoise)
{
    $imagick = new \\Imagick(realpath($imagePath));
    @$imagick->reduceNoiseImage($reduceNoise);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1642;s:7:"endLine";i:1650;}',
    ),
    'remapimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"remapImage";s:5:"lines";s:268:"function remapImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick2 = new \\Imagick(realpath("images/Biter_500.jpg"));
    $imagick->remapImage($imagick2, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1652;s:7:"endLine";i:1661;}',
    ),
    'resampleimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"resampleImage";s:5:"lines";s:233:"function resampleImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));

    $imagick->resampleImage(200, 200, \\Imagick::FILTER_LANCZOS, 1);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1663;s:7:"endLine";i:1672;}',
    ),
    'resizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"resizeImage";s:5:"lines";s:854:"function resizeImage($imagePath, $width, $height, $filterType, $blur, $bestFit, $cropZoom)
{
    //The blur factor where &gt; 1 is blurry, &lt; 1 is sharp.
    $imagick = new \\Imagick(realpath($imagePath));

    $imagick->resizeImage($width, $height, $filterType, $blur, $bestFit);

    $cropWidth = $imagick->getImageWidth();
    $cropHeight = $imagick->getImageHeight();

    if ($cropZoom) {
        $newWidth = $cropWidth / 2;
        $newHeight = $cropHeight / 2;

        $imagick->cropimage(
            $newWidth,
            $newHeight,
            ($cropWidth - $newWidth) / 2,
            ($cropHeight - $newHeight) / 2
        );

        $imagick->scaleimage(
            $imagick->getImageWidth() * 4,
            $imagick->getImageHeight() * 4
        );
    }


    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1676;s:7:"endLine";i:1708;}',
    ),
    'rollimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"rollImage";s:5:"lines";s:217:"function rollImage($imagePath, $rollX, $rollY)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->rollimage($rollX, $rollY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1711;s:7:"endLine";i:1719;}',
    ),
    'rotateimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"rotateImage";s:5:"lines";s:404:"function rotateImage($imagePath, $angle, $color, $crop)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->rotateImage($color, $angle);

    if ($crop) {
        $imagick->setImagePage(
            $imagick->getimageWidth(),
            $imagick->getimageheight(),
            0,
            0
        );
    }

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1721;s:7:"endLine";i:1739;}',
    ),
    'rotationalblurimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:19:"rotationalBlurImage";s:5:"lines";s:284:"function rotationalBlurImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->rotationalBlurImage(3);
    $imagick->rotationalBlurImage(5);
    $imagick->rotationalBlurImage(7);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1741;s:7:"endLine";i:1751;}',
    ),
    'roundcorners' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"roundCorners";s:5:"lines";s:511:"function roundCorners($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->setBackgroundColor(\'red\');

    $imagick->setbackgroundcolor(\'pink\');

    $x_rounding = 40;
    $y_rounding = 40;
    $stroke_width = 5;
    $displace = 0;
    $size_correction = 0;

    $imagick->roundCornersImage(
        $x_rounding,
        $y_rounding,
        $stroke_width,
        $displace,
        $size_correction
    );

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1753;s:7:"endLine";i:1778;}',
    ),
    'scaleimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"scaleImage";s:5:"lines";s:203:"function scaleImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->scaleImage(150, 150, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1780;s:7:"endLine";i:1788;}',
    ),
    'segmentimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"segmentImage";s:5:"lines";s:291:"function segmentImage($imagePath, $colorSpace, $clusterThreshold, $smoothThreshold)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->segmentImage($colorSpace, $clusterThreshold, $smoothThreshold);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1791;s:7:"endLine";i:1799;}',
    ),
    'selectiveblurimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:18:"selectiveBlurImage";s:5:"lines";s:281:"function selectiveBlurImage($imagePath, $radius, $sigma, $threshold, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->selectiveBlurImage($radius, $sigma, $threshold, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1802;s:7:"endLine";i:1810;}',
    ),
    'separateimagechannel' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:20:"separateImageChannel";s:5:"lines";s:227:"function separateImageChannel($imagePath, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->separateimagechannel($channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1813;s:7:"endLine";i:1821;}',
    ),
    'sepiatoneimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"sepiaToneImage";s:5:"lines";s:211:"function sepiaToneImage($imagePath, $sepia)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->sepiaToneImage($sepia);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1825;s:7:"endLine";i:1833;}',
    ),
    'setcompressionquality' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:21:"setCompressionQuality";s:5:"lines";s:468:"function setCompressionQuality($imagePath, $quality)
{
    $backgroundImagick = new \\Imagick(realpath($imagePath));
    $imagick = new \\Imagick();
    $imagick->setCompressionQuality($quality);
    $imagick->newPseudoImage(
        $backgroundImagick->getImageWidth(),
        $backgroundImagick->getImageHeight(),
        \'canvas:white\'
    );
    
    $imagick->setFormat("jpg");
    header("Content-Type: image/jpg");
    echo $backgroundImagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1836;s:7:"endLine";i:1852;}',
    ),
    'setimageartifact' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"setImageArtifact";s:5:"lines";s:496:"function setImageArtifact()
{
    $src1 = new \\Imagick(realpath("./images/artifact/source1.png"));
    $src2 = new \\Imagick(realpath("./images/artifact/source2.png"));

    $src2->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
    $src2->setImageArtifact(\'compose:args\', "1,0,-0.5,0.5");
    $src1->compositeImage($src2, Imagick::COMPOSITE_MATHEMATICS, 0, 0);
    
    $src1->setImageFormat(\'png\');
    header("Content-Type: image/png");
    echo $src1->getImagesBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1856;s:7:"endLine";i:1870;}',
    ),
    'setimagecompressionquality' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:26:"setImageCompressionQuality";s:5:"lines";s:239:"function setImageCompressionQuality($imagePath, $quality)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->setImageCompressionQuality($quality);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1873;s:7:"endLine";i:1881;}',
    ),
    'setimageorientation' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:19:"setImageOrientation";s:5:"lines";s:273:"//Doesn\'t appear to do anything
function setImageOrientation($imagePath, $orientationType)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->setImageOrientation($orientationType);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1884;s:7:"endLine";i:1893;}',
    ),
    'setimagebias' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"setImageBias";s:5:"lines";s:507:"//requires ImageMagick version 6.9.0-1 to have an effect on convolveImage
function setImageBias($bias)
{
    $imagick = new \\Imagick(realpath("images/stack.jpg"));

    $xKernel = array(
        -0.70, 0, 0.70,
        -0.70, 0, 0.70,
        -0.70, 0, 0.70
    );

    $imagick->setImageBias($bias * \\Imagick::getQuantum());
    $imagick->convolveImage($xKernel, \\Imagick::CHANNEL_ALL);

    $imagick->setImageFormat(\'png\');
    
    header(\'Content-type: image/png\');
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1896;s:7:"endLine";i:1916;}',
    ),
    'setimageclipmask' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"setImageClipMask";s:5:"lines";s:751:"function setImageClipMask($imagePath)
{
    $imagick = new \\Imagick();
    $imagick->readImage(realpath($imagePath));

    $width = $imagick->getImageWidth();
    $height = $imagick->getImageHeight();

    $clipMask = new \\Imagick();
    $clipMask->newPseudoImage(
        $width,
        $height,
        "canvas:transparent"
    );

    $draw = new \\ImagickDraw();
    $draw->setFillColor(\'white\');
    $draw->circle(
        $width / 2,
        $height / 2,
        ($width / 2) + ($width / 4),
        $height / 2
    );
    $clipMask->drawImage($draw);
    $imagick->setImageClipMask($clipMask);

    $imagick->negateImage(false);
    $imagick->setFormat("png");

    header("Content-Type: image/png");
    echo $imagick->getImagesBlob();
    
}
";s:11:"description";s:0:"";s:9:"startLine";i:1919;s:7:"endLine";i:1953;}',
    ),
    'setimagedelay' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"setImageDelay";s:5:"lines";s:395:"function setImageDelay()
{
    $imagick = new \\Imagick(realpath("images/coolGif.gif"));

    $frameCount = 0;

    foreach ($imagick as $frame) {
        /** @var $frame \\Imagick */
        $frame->setImageDelay((($frameCount % 11) * 5));
        $frameCount++;
    }

    $imagick2 = $imagick->deconstructImages();

    header("Content-Type: image/gif");
    echo $imagick2->getImagesBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1956;s:7:"endLine";i:1974;}',
    ),
    'setimageresolution' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:18:"setImageResolution";s:5:"lines";s:216:"function setImageResolution($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->setImageResolution(50, 50);
    
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1977;s:7:"endLine";i:1986;}',
    ),
    'setimagetickspersecond' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:22:"setImageTicksPerSecond";s:5:"lines";s:743:"function setImageTicksPerSecond()
{
    $imagick = new \\Imagick(realpath("images/coolGif.gif"));
    $totalFrames = $imagick->getNumberImages();
    $frameCount = 0;

    foreach ($imagick as $frame) {
        /** @var $frame \\Imagick */

        if ($frameCount < ($totalFrames / 2)) {
            //Modify the frame to be displayed for twice as long as it currently is.
            $frame->setImageTicksPerSecond(50);
        }
        else {
            //Modify the frame to be displayed for half as long as it currently is.
            $frame->setImageTicksPerSecond(200);
        }
        $frameCount++;
    }

    $imagick2 = $imagick->deconstructImages();
    header("Content-Type: image/gif");
    echo $imagick2->getImagesBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1989;s:7:"endLine";i:2014;}',
    ),
    'setiteratorindex' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"setIteratorIndex";s:5:"lines";s:458:"function setIteratorIndex($firstLayer)
{
    $imagick = new \\Imagick(realpath("images/LayerTest.psd"));
    $output = new \\Imagick();
    $imagick->setIteratorIndex($firstLayer);

    do {
        $output->addImage($imagick->getimage());
    } while ($imagick->nextImage());

    $merged = $output->mergeImageLayers(\\Imagick::LAYERMETHOD_MERGE);

    $merged->setImageFormat(\'png\');
    header("Content-Type: image/png");
    echo $merged->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2017;s:7:"endLine";i:2034;}',
    ),
    'setsamplingfactors' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:18:"setSamplingFactors";s:5:"lines";s:600:"function setSamplingFactors($imagePath)
{
    $imagePath = "../imagick/images/FineDetail.png";
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->setImageFormat(\'jpg\');
    $imagick->setSamplingFactors(array(\'2x2\', \'1x1\', \'1x1\'));

    $compressed = $imagick->getImageBlob();

    
    $reopen = new \\Imagick();
    $reopen->readImageBlob($compressed);

    $reopen->resizeImage(
        $reopen->getImageWidth() * 4,
        $reopen->getImageHeight() * 4,
        \\Imagick::FILTER_POINT,
        1
    );
    
    header("Content-Type: image/jpg");
    echo $reopen->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2057;s:7:"endLine";i:2081;}',
    ),
    'shadeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"shadeImage";s:5:"lines";s:201:"function shadeImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->shadeImage(true, 45, 20);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2083;s:7:"endLine";i:2091;}',
    ),
    'shadowimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"shadowImage";s:5:"lines";s:205:"function shadowImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->shadowImage(0.4, 10, 50, 5);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2093;s:7:"endLine";i:2101;}',
    ),
    'sharpenimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"sharpenImage";s:5:"lines";s:245:"function sharpenImage($imagePath, $radius, $sigma, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->sharpenimage($radius, $sigma, $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2104;s:7:"endLine";i:2112;}',
    ),
    'shaveimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"shaveImage";s:5:"lines";s:196:"function shaveImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->shaveImage(100, 50);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2115;s:7:"endLine";i:2123;}',
    ),
    'shearimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"shearimage";s:5:"lines";s:239:"function shearImage($imagePath, $color, $shearX, $shearY)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->shearimage($color, $shearX, $shearY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2126;s:7:"endLine";i:2134;}',
    ),
    'sigmoidalcontrastimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:22:"sigmoidalContrastImage";s:5:"lines";s:407:"function sigmoidalContrastImage($imagePath, $sharpening, $midpoint, $sigmoidalContrast)
{
    $imagick = new \\Imagick(realpath($imagePath));
    //Need some stereo image to work with.
    $imagick->sigmoidalcontrastimage(
        $sharpening, //sharpen
        $midpoint,
        $sigmoidalContrast * \\Imagick::getQuantum()
    );
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2137;s:7:"endLine";i:2150;}',
    ),
    'sketchimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"sketchimage";s:5:"lines";s:239:"function sketchImage($imagePath, $radius, $sigma, $angle)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->sketchimage($radius, $sigma, $angle);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2153;s:7:"endLine";i:2161;}',
    ),
    'smushimages' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"smushImages";s:5:"lines";s:346:"function smushImages($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick2 = new \\Imagick(realpath("images/coolGif.gif"));

    $imagick->addimage($imagick2);
    $smushed = $imagick->smushImages(false, 50);
    $smushed->setImageFormat(\'jpg\');
    header("Content-Type: image/jpg");
    echo $smushed->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2163;s:7:"endLine";i:2175;}',
    ),
    'solarizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"solarizeImage";s:5:"lines";s:258:"function solarizeImage($imagePath, $solarizeThreshold)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->solarizeImage($solarizeThreshold * \\Imagick::getQuantum());
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2178;s:7:"endLine";i:2186;}',
    ),
    'spliceimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"spliceImage";s:5:"lines";s:259:"function spliceImage($imagePath, $startX, $startY, $width, $height)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->spliceImage($width, $height, $startX, $startY);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2189;s:7:"endLine";i:2197;}',
    ),
    'spreadimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"spreadImage";s:5:"lines";s:207:"function spreadImage($imagePath, $radius)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->spreadImage($radius);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2199;s:7:"endLine";i:2207;}',
    ),
    'statisticimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"statisticImage";s:5:"lines";s:311:"function statisticImage($imagePath, $statisticType, $w20, $h20, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));

    $imagick->statisticImage(
        $statisticType,
        $w20,
        $h20,
        $channel
    );

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2210;s:7:"endLine";i:2225;}',
    ),
    'stereoimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:11:"stereoImage";s:5:"lines";s:253:"function stereoImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    //TODO - Need some stereo image to work with.
    $imagick->stereoImage(true, 45, 20);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2228;s:7:"endLine";i:2237;}',
    ),
    'subimagematch' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"subImageMatch";s:5:"lines";s:450:"function subImageMatch($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick2 = clone $imagick;
    $imagick2->cropimage(40, 40, 250, 110);
    $imagick2->vignetteimage(0, 1, 3, 3);

    $similarity = null;
    $bestMatch = null;
    $comparison = $imagick->subImageMatch($imagick2, $bestMatch, $similarity);

    $comparison->setImageFormat(\'png\');
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2240;s:7:"endLine";i:2256;}',
    ),
    'swirlimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"swirlImage";s:5:"lines";s:203:"function swirlImage($imagePath, $swirl)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->swirlImage($swirl);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2260;s:7:"endLine";i:2268;}',
    ),
    'textureimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"textureImage";s:5:"lines";s:398:"function textureImage($imagePath)
{
    $image = new \\Imagick();
    $image->newImage(640, 480, new \\ImagickPixel(\'pink\'));
    $image->setImageFormat("jpg");
    $texture = new \\Imagick(realpath($imagePath));
    $texture->scaleimage($image->getimagewidth() / 4, $image->getimageheight() / 4);
    $image = $image->textureImage($texture);
    header("Content-Type: image/jpg");
    echo $image;
}
";s:11:"description";s:0:"";s:9:"startLine";i:2270;s:7:"endLine";i:2282;}',
    ),
    'thresholdimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"thresholdimage";s:5:"lines";s:264:"function thresholdimage($imagePath, $threshold, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->thresholdimage($threshold * \\Imagick::getQuantum(), $channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2285;s:7:"endLine";i:2293;}',
    ),
    'thumbnailimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"thumbnailImage";s:5:"lines";s:270:"function thumbnailImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->setbackgroundcolor(\'rgb(64, 64, 64)\');
    $imagick->thumbnailImage(100, 100, true, true);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2296;s:7:"endLine";i:2305;}',
    ),
    'tintimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"tintImage";s:5:"lines";s:675:"function tintImage($r, $g, $b, $a)
{
    $a = $a / 100;

    $imagick = new \\Imagick();
    $imagick->newPseudoImage(400, 400, \'gradient:black-white\');

    $tint = new \\ImagickPixel("rgb($r, $g, $b)");
    $opacity = new \\ImagickPixel("rgba(".(255 *$a*100).", $g, $b, $a)");
    
    
    $imagick->tintImage($tint, $opacity);
    $imagick->setImageFormat(\'png\');
    
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor(\'black\');
    $draw->setFillColor(\'white\');
 
    $draw->setStrokeWidth(1);
    $draw->setFontSize(36);
    
    $imagick->annotateImage($draw, 50, 50, 0, "Alpha is $a");
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2308;s:7:"endLine";i:2334;}',
    ),
    'transformimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"transformimage";s:5:"lines";s:230:"function transformimage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $newImage = $imagick->transformimage("400x600", "200x300");
    header("Content-Type: image/jpg");
    echo $newImage->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2337;s:7:"endLine";i:2345;}',
    ),
    'transformimagecolorspace' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:24:"transformImageColorspace";s:5:"lines";s:297:"function transformImageColorspace($imagePath, $colorSpace, $channel)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->transformimagecolorspace($colorSpace);
    $imagick->separateImageChannel($channel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2348;s:7:"endLine";i:2357;}',
    ),
    'transparentpaintimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:21:"transparentPaintImage";s:5:"lines";s:782:"function transparentPaintImage($color, $alpha, $fuzz, $inverse)
{
    $imagick = new \\Imagick(realpath("images/BlueScreen.jpg"));

    //Need to be in a format that supports transparency
    $imagick->setimageformat(\'png\');

    $imagick->transparentPaintImage(
        $color, $alpha, $fuzz * \\Imagick::getQuantum(), $inverse
    );

    //Not required, but helps tidy up left over pixels
    $imagick->despeckleimage();
    
    $canvas = new Imagick();
    $canvas->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "pattern:checkerboard"
    );
    
    $canvas->compositeimage($imagick, \\Imagick::COMPOSITE_ATOP, 0, 0);
    $canvas->setImageFormat(\'png\');

    header("Content-Type: image/png");
    echo $canvas->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2360;s:7:"endLine";i:2388;}',
    ),
    'transposeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"transposeImage";s:5:"lines";s:197:"function transposeImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->transposeImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2391;s:7:"endLine";i:2399;}',
    ),
    'transverseimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:15:"transverseImage";s:5:"lines";s:199:"function transverseImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->transverseImage();
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2402;s:7:"endLine";i:2410;}',
    ),
    'trimimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"trimImage";s:5:"lines";s:277:"function trimImage($color, $fuzz)
{
    $imagick = new \\Imagick(realpath("images/BlueScreen.jpg"));
    $imagick->borderImage($color, 10, 10);
    $imagick->trimImage($fuzz * \\Imagick::getQuantum());

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2413;s:7:"endLine";i:2423;}',
    ),
    'uniqueimagecolors' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:17:"uniqueImageColors";s:5:"lines";s:412:"function uniqueImageColors($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    //Reduce the image to 256 colours nicely.
    $imagick->quantizeImage(256, \\Imagick::COLORSPACE_YIQ, 0, false, false);
    $imagick->uniqueImageColors();
    $imagick->scaleimage($imagick->getImageWidth(), $imagick->getImageHeight() * 20);
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2426;s:7:"endLine";i:2437;}',
    ),
    'unsharpmaskimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"unsharpMaskImage";s:5:"lines";s:289:"function unsharpMaskImage($imagePath, $radius, $sigma, $amount, $unsharpThreshold)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->unsharpMaskImage($radius, $sigma, $amount, $unsharpThreshold);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2440;s:7:"endLine";i:2448;}',
    ),
    'vignetteimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:13:"vignetteImage";s:5:"lines";s:261:"function vignetteImage($imagePath, $blackPoint, $whitePoint, $x, $y)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->vignetteImage($blackPoint, $whitePoint, $x, $y);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2451;s:7:"endLine";i:2459;}',
    ),
    'waveimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"waveImage";s:5:"lines";s:227:"function waveImage($imagePath, $amplitude, $length)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->waveImage($amplitude, $length);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:27:"WaveImage can be quite slow";s:9:"startLine";i:2462;s:7:"endLine";i:2470;}',
    ),
    'whitethresholdimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:19:"whiteThresholdImage";s:5:"lines";s:221:"function whiteThresholdImage($imagePath, $color)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->whiteThresholdImage($color);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:2473;s:7:"endLine";i:2481;}',
    ),
    'identifyformat' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:14:"identifyFormat";s:5:"lines";s:246:"        $output = "Output of \'Trim box: %@ number of unique colors: %k\' is: <br/>";
        $imagick = new \\Imagick(realpath("./images/artifact/mask.png"));
        $output .= $imagick->identifyFormat("Trim box: %@ number of unique colors: %k");
";s:11:"description";s:0:"";s:9:"startLine";i:20;s:7:"endLine";i:24;}',
    ),
    'morphology' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:278:"        $imagick = $this->getCharacter();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_GAUSSIAN, "5,1");
        $imagick->morphology(\\Imagick::MORPHOLOGY_CONVOLVE, 2, $kernel);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
";s:11:"description";s:8:"Convolve";s:9:"startLine";i:237;s:7:"endLine";i:243;}',
      1 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:411:"
        // Top-left pixel must be black
        // Bottom right pixel must be white
        // We don\'t care about the rest.


        $imagick = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromMatrix(self::$correlateMatrix, [2, 2]);
        $imagick->morphology(\\Imagick::MORPHOLOGY_CORRELATE, 1, $kernel);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
";s:11:"description";s:9:"Correlate";s:9:"startLine";i:249;s:7:"endLine";i:261;}',
      2 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:276:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_ERODE, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:5:"Erode";s:9:"startLine";i:267;s:7:"endLine";i:273;}',
      3 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:279:"        $canvas = $this->getCharacter();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "1");
        $canvas->morphology(\\Imagick::MORPHOLOGY_ERODE_INTENSITY, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:15:"Erode Intensity";s:9:"startLine";i:278;s:7:"endLine";i:284;}',
      4 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:277:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DILATE, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:6:"Dilate";s:9:"startLine";i:289;s:7:"endLine";i:295;}',
      5 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:280:"        $canvas = $this->getCharacter();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "1");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DILATE_INTENSITY, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:16:"Dilate intensity";s:9:"startLine";i:300;s:7:"endLine";i:306;}',
      6 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:316:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_CHEBYSHEV, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:30:"Distance with Chebyshev kernel";s:9:"startLine";i:312;s:7:"endLine";i:319;}',
      7 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:316:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_MANHATTAN, "5");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:30:"Distance with Manhattan kernel";s:9:"startLine";i:324;s:7:"endLine";i:331;}',
      8 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:316:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGONAL, "5");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:31:"Distance with ocatagonal kernel";s:9:"startLine";i:336;s:7:"endLine";i:343;}',
      9 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:316:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_EUCLIDEAN, "4");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:30:"Distance with Euclidean kernel";s:9:"startLine";i:348;s:7:"endLine";i:355;}',
      10 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:275:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_EDGE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:4:"Edge";s:9:"startLine";i:360;s:7:"endLine";i:366;}',
      11 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:486:"        // As a result you will see that \'Open\' smoothed the outline, by rounding off any sharp points, and remove any parts that is smaller than the shape used. It will also disconnect or \'open\' any thin bridges.
        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\\Imagick::MORPHOLOGY_OPEN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:4:"Open";s:9:"startLine";i:371;s:7:"endLine";i:378;}',
      12 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:490:"        // As a result you will see that \'Open\' smoothed the outline, by rounding off any sharp points, and remove any parts that is smaller than the shape used. It will also disconnect or \'open\' any thin bridges.

        $canvas = $this->getCharacter();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\\Imagick::MORPHOLOGY_OPEN_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:14:"Open intensity";s:9:"startLine";i:384;s:7:"endLine";i:392;}',
      13 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:480:"        //The basic use of the \'Close\' method is to reduce or remove any \'holes\' or \'gaps\' about the size of the kernel \'Structure Element\'. That is \'close\' parts of the background that are about that size.
        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\\Imagick::MORPHOLOGY_CLOSE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:5:"Close";s:9:"startLine";i:397;s:7:"endLine";i:404;}',
      14 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:483:"        //The basic use of the \'Close\' method is to reduce or remove any \'holes\' or \'gaps\' about the size of the kernel \'Structure Element\'. That is \'close\' parts of the background that are about that size.
        $canvas = $this->getCharacter();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\\Imagick::MORPHOLOGY_CLOSE_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:15:"Close Intensity";s:9:"startLine";i:409;s:7:"endLine";i:416;}',
      15 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:277:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_SMOOTH, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:6:"Smooth";s:9:"startLine";i:422;s:7:"endLine";i:428;}',
      16 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:278:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_EDGE_IN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:7:"Edge in";s:9:"startLine";i:433;s:7:"endLine";i:439;}',
      17 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:279:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_EDGE_OUT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:8:"Edge out";s:9:"startLine";i:444;s:7:"endLine";i:450;}',
      18 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:275:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "5");
        $canvas->morphology(\\Imagick::MORPHOLOGY_TOP_HAT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:227:"The \'TopHat\' method, or more specifically \'White Top Hat\', returns the pixels that were removed by a Opening of the shape, that is the pixels that were removed to round off the points, and the connecting bridged between shapes.";s:9:"startLine";i:455;s:7:"endLine";i:461;}',
      19 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:279:"
        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "5");
        $canvas->morphology(\\Imagick::MORPHOLOGY_BOTTOM_HAT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:198:"The \'BottomHat\' method, also known as \'Black TopHat\' is the pixels that a Closing of the shape adds to the image. That is the the pixels that were used to fill in the \'holes\', \'gaps\', and \'bridges\'.";s:9:"startLine";i:467;s:7:"endLine";i:474;}',
      20 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:412:"        $canvas = $this->getCharacterOutline();
        //This finds all the pixels with 3 pixels of the right edge
        $matrix = [[1, false, false, 0]];
        $kernel = \\ImagickKernel::fromMatrix(
            $matrix,
            [0, 0]
        );
        $canvas->morphology(\\Imagick::MORPHOLOGY_HIT_AND_MISS, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:12:"Hit and Miss";s:9:"startLine";i:480;s:7:"endLine";i:491;}',
      21 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:409:"        $canvas = $this->getCharacterOutline();
        $leftEdgeKernel = \\ImagickKernel::fromMatrix([[0, 1]], [1, 0]);
        $rightEdgeKernel = \\ImagickKernel::fromMatrix([[1, 0]], [0, 0]);
        $leftEdgeKernel->addKernel($rightEdgeKernel);

        $canvas->morphology(\\Imagick::MORPHOLOGY_THINNING, 3, $leftEdgeKernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:8:"Thinning";s:9:"startLine";i:497;s:7:"endLine";i:506;}',
      22 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:408:"        $canvas = $this->getCharacterOutline();
        $leftEdgeKernel = \\ImagickKernel::fromMatrix([[0, 1]], [1, 0]);
        $rightEdgeKernel = \\ImagickKernel::fromMatrix([[1, 0]], [0, 0]);
        $leftEdgeKernel->addKernel($rightEdgeKernel);

        $canvas->morphology(\\Imagick::MORPHOLOGY_THICKEN, 3, $leftEdgeKernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:7:"Thicken";s:9:"startLine";i:511;s:7:"endLine";i:520;}',
      23 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:646:"        $canvas = $this->getCharacterOutline();
        $diamondKernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DIAMOND, "1");
        $convexKernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_CONVEX_HULL, "");

        // The thicken morphology doesn\'t handle small gaps. We close them
        // with the close morphology.
        $canvas->morphology(\\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);
        $canvas->morphology(\\Imagick::MORPHOLOGY_THICKEN, -1, $convexKernel);
        $canvas->morphology(\\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);

        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:31:"Thick to generate a convex hull";s:9:"startLine";i:525;s:7:"endLine";i:538;}',
      24 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:312:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "2");
        $canvas->morphology(\\Imagick::MORPHOLOGY_ITERATIVE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:20:"Iterative morphology";s:9:"startLine";i:543;s:7:"endLine";i:550;}',
      25 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"morphology";s:5:"lines";s:814:"    private function getCharacterOutline()
    {

        $imagick = new \\Imagick(realpath("./images/character.png"));
        $character = new \\Imagick();
        $character->newPseudoImage(
            $imagick->getImageWidth(),
            $imagick->getImageHeight(),
            "canvas:white"
        );
        $canvas = new \\Imagick();
        $canvas->newPseudoImage(
            $imagick->getImageWidth(),
            $imagick->getImageHeight(),
            "canvas:black"
        );

        $character->compositeimage(
            $imagick,
            \\Imagick::COMPOSITE_COPYOPACITY,
            0, 0
        );
        $canvas->compositeimage(
            $character,
            \\Imagick::COMPOSITE_ATOP,
            0, 0
        );
        $canvas->setFormat(\'png\');

        return $canvas;
    }
";s:11:"description";s:41:"Helper functon to get an image silhouette";s:9:"startLine";i:561;s:7:"endLine";i:593;}',
    ),
    'quantum' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:7:"Quantum";s:5:"lines";s:173:"        $quantumRange = $imagick->getQuantumRange();
        print_r($quantumRange);


        $quantumDepth = $imagick->getQuantumDepth();
        print_r($quantumDepth);

";s:11:"description";s:0:"";s:9:"startLine";i:16;s:7:"endLine";i:24;}',
    ),
    'queryfonts' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"queryFonts";s:5:"lines";s:273:"        $output = \'\';
        $output .= "Fonts that match \'Helvetica*\' are:<br/>";

        $fontList = \\Imagick::queryFonts("Helvetica*");

        foreach ($fontList as $fontName) {
            $output .= \'<li>\' . $fontName . "</li>";
        }

        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:9;s:7:"endLine";i:20;}',
    ),
    'queryformats' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:12:"queryformats";s:5:"lines";s:608:"    public function render()
    {
        $output = "";
        $input = \\Imagick::queryformats();
        $columns = 6;

        $output .= "<table border=\'2\'>";

        for ($i = 0; $i < count($input); $i += $columns) {
            $output .= "<tr>";
            for ($c = 0; $c < $columns; $c++) {
                $output .= "<td>";
                if (($i + $c) < count($input)) {
                    $output .= $input[$i + $c];
                }
                $output .= "</td>";
            }
            $output .= "</tr>";
        }

        $output .= "</table>";

        return $output;
    }
";s:11:"description";s:0:"";s:9:"startLine";i:8;s:7:"endLine";i:33;}',
    ),
    'setoption' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"setOption";s:5:"lines";s:335:"    public function renderJPG($extent)
    {
        $imagePath = $this->control->getImagePath();
        $imagick = new \\Imagick(realpath($imagePath));
        $imagick->setImageFormat(\'jpg\');
        $imagick->setOption(\'jpeg:extent\', $extent);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
";s:11:"description";s:0:"";s:9:"startLine";i:53;s:7:"endLine";i:63;}',
      1 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"setOption";s:5:"lines";s:334:"    public function renderPNG($format)
    {
        $imagePath = $this->control->getImagePath();
        $imagick = new \\Imagick(realpath($imagePath));
        $imagick->setImageFormat(\'png\');
        $imagick->setOption(\'png:format\', $format);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
";s:11:"description";s:0:"";s:9:"startLine";i:65;s:7:"endLine";i:75;}',
      2 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:9:"setOption";s:5:"lines";s:633:"    public function renderCustomBitDepthPNG()
    {
        $imagePath = $this->control->getImagePath();
        $imagick = new \\Imagick(realpath($imagePath));
        $imagick->setImageFormat(\'png\');

        $imagick->setOption(\'png:bit-depth\', \'16\');
        $imagick->setOption(\'png:color-type\', 6);
        header("Content-Type: image/png");
        $crash = true;
        if ($crash) {
            echo $imagick->getImageBlob();
        } else {
            $tempFilename = tempnam(\'./\', \'imagick\');
            $imagick->writeimage(realpath($tempFilename));
            echo file_get_contents($tempFilename);
        }
    }

";s:11:"description";s:0:"";s:9:"startLine";i:83;s:7:"endLine";i:103;}',
    ),
    'setprogressmonitor' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:18:"setProgressMonitor";s:5:"lines";s:1290:"        $abortReason = null;

        try {
            $imagick = new \\Imagick(realpath($this->control->getImagePath()));
            $startTime = time();

            $callback = function ($offset, $span) use ($startTime, &$abortReason) {
                if (((100 * $offset) / $span) > 20) {
                    $abortReason = "Processing reached 20%";
                    return false;
                }

                $nowTime = time();

                if ($nowTime - $startTime > 5) {
                    $abortReason = "Image processing took more than 5 seconds";
                    return false;
                }
                if (($offset % 5) == 0) {
                    echo "Progress: $offset / $span <br/>";
                }
                return true;
            };

            $imagick->setProgressMonitor($callback);

            $imagick->waveImage(2, 15);

            echo "Data len is: " . strlen($imagick->getImageBlob());
        }
        catch (\\ImagickException $e) {
            if ($abortReason != null) {
                echo "Image processing was aborted: " . $abortReason . "<br/>";
            }
            else {
                echo "ImagickException caught: " . $e->getMessage() . " Exception type is " . get_class($e);
            }
        }
";s:11:"description";s:0:"";s:9:"startLine";i:33;s:7:"endLine";i:72;}',
    ),
    'sparsecolorimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"sparseColorImage";s:5:"lines";s:454:"    public function renderImageBarycentric2()
    {
        $points = [
            [0.30, 0.10, \'red\'],
            [0.10, 0.80, \'blue\'],
            [0.70, 0.60, \'lime\'],
            [0.80, 0.20, \'yellow\'],
        ];
        $imagick = createGradientImage(
            400, 400,
            $points,
            \\Imagick::SPARSECOLORMETHOD_BARYCENTRIC
        );
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
";s:11:"description";s:29:"SPARSECOLORMETHOD_BARYCENTRIC";s:9:"startLine";i:75;s:7:"endLine";i:92;}',
      1 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"sparseColorImage";s:5:"lines";s:343:"    public function renderImageBilinear()
    {
        $points = [[0.30, 0.10, \'red\'], [0.10, 0.80, \'blue\'], [0.70, 0.60, \'lime\'], [0.80, 0.20, \'yellow\'],];
        $imagick = createGradientImage(500, 500, $points, \\Imagick::SPARSECOLORMETHOD_BILINEAR);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
";s:11:"description";s:26:"SPARSECOLORMETHOD_BILINEAR";s:9:"startLine";i:94;s:7:"endLine";i:102;}',
      2 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"sparseColorImage";s:5:"lines";s:401:"    public function renderImageShepards()
    {
        $points = [
            [0.30, 0.10, \'red\'],
            [0.10, 0.80, \'blue\'],
            [0.70, 0.60, \'lime\'],
            [0.80, 0.20, \'yellow\'],
        ];
        $imagick = createGradientImage(600, 600, $points, \\Imagick::SPARSECOLORMETHOD_SPEPARDS);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
";s:11:"description";s:26:"SPARSECOLORMETHOD_SPEPARDS";s:9:"startLine";i:155;s:7:"endLine";i:168;}',
      3 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"sparseColorImage";s:5:"lines";s:399:"    public function renderImageVoronoi()
    {
        $points = [
            [0.30, 0.10, \'red\'],
            [0.10, 0.80, \'blue\'],
            [0.70, 0.60, \'lime\'],
            [0.80, 0.20, \'yellow\'],
        ];
        $imagick = createGradientImage(500, 500, $points, \\Imagick::SPARSECOLORMETHOD_VORONOI);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
";s:11:"description";s:25:"SPARSECOLORMETHOD_VORONOI";s:9:"startLine";i:171;s:7:"endLine";i:184;}',
      4 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"sparseColorImage";s:5:"lines";s:363:"    public function renderImageBarycentric()
    {
        $points = [
            [0, 0, \'skyblue\'],
            [-1, 1, \'skyblue\'],
            [1, 1, \'black\'],
        ];
        $imagick = createGradientImage(600, 200, $points, \\Imagick::SPARSECOLORMETHOD_BARYCENTRIC);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }

";s:11:"description";s:29:"SPARSECOLORMETHOD_BARYCENTRIC";s:9:"startLine";i:186;s:7:"endLine";i:199;}',
      5 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:16:"sparseColorImage";s:5:"lines";s:1618:"function createGradientImage($width, $height, $colorPoints, $sparseMethod, $absolute = false)
{
    $imagick = new \\Imagick();
    $imagick->newImage($width, $height, "white");
    $imagick->setImageFormat("png");

    $barycentricPoints = array();

    foreach ($colorPoints as $colorPoint) {
        if ($absolute == true) {
            $barycentricPoints[] = $colorPoint[0];
            $barycentricPoints[] = $colorPoint[1];
        } else {
            $barycentricPoints[] = $colorPoint[0] * $width;
            $barycentricPoints[] = $colorPoint[1] * $height;
        }

        if (is_string($colorPoint[2])) {
            $imagickPixel = new \\ImagickPixel($colorPoint[2]);
        } else if ($colorPoint[2] instanceof \\ImagickPixel) {
            $imagickPixel = $colorPoint[2];
        } else {
            $errorMessage = sprintf(
                "Value %s is neither a string nor an ImagickPixel class. Cannot use as a color.",
                $colorPoint[2]
            );

            throw new \\InvalidArgumentException(
                $errorMessage
            );
        }

        $red = $imagickPixel->getColorValue(\\Imagick::COLOR_RED);
        $green = $imagickPixel->getColorValue(\\Imagick::COLOR_GREEN);
        $blue = $imagickPixel->getColorValue(\\Imagick::COLOR_BLUE);
        $alpha = $imagickPixel->getColorValue(\\Imagick::COLOR_ALPHA);

        $barycentricPoints[] = $red;
        $barycentricPoints[] = $green;
        $barycentricPoints[] = $blue;
        $barycentricPoints[] = $alpha;
    }

    $imagick->sparseColorImage($sparseMethod, $barycentricPoints);

    return $imagick;
}
";s:11:"description";s:46:"createGradientImage is used by other examples.";s:9:"startLine";i:305;s:7:"endLine";i:353;}',
    ),
    'stripimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:7:"Imagick";s:12:"functionName";s:10:"stripImage";s:5:"lines";s:351:"        $imagick = new \\Imagick(realpath("../imagick/images/Biter_500.jpg"));
        $bytes = $imagick->getImageBlob();
        echo "Image byte size before stripping: " . strlen($bytes) . "<br/>";
        $imagick->stripImage();
        $bytes = $imagick->getImageBlob();
        echo "Image byte size after stripping: " . strlen($bytes) . "<br/>";
";s:11:"description";s:0:"";s:9:"startLine";i:14;s:7:"endLine";i:21;}',
    ),
  ),
  'imagickdraw' => 
  array (
    'affine' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:6:"affine";s:5:"lines";s:1939:"function affine($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeWidth(1);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);

    $PI = 3.141592653589794;
    $angle = 60 * $PI / 360;

    //Scale the drawing co-ordinates.
    $affineScale = array("sx" => 1.75, "sy" => 1.75, "rx" => 0, "ry" => 0, "tx" => 0, "ty" => 0);

    //Shear the drawing co-ordinates.
    $affineShear = array("sx" => 1, "sy" => 1, "rx" => sin($angle), "ry" => -sin($angle), "tx" => 0, "ty" => 0);

    //Rotate the drawing co-ordinates. The shear affine matrix
    //produces incorrectly scaled drawings.
    $affineRotate = array("sx" => cos($angle), "sy" => cos($angle), "rx" => sin($angle), "ry" => -sin($angle), "tx" => 0, "ty" => 0,);

    //Translate (offset) the drawing
    $affineTranslate = array("sx" => 1, "sy" => 1, "rx" => 0, "ry" => 0, "tx" => 30, "ty" => 30);

    //The identiy affine matrix
    $affineIdentity = array("sx" => 1, "sy" => 1, "rx" => 0, "ry" => 0, "tx" => 0, "ty" => 0);

    $examples = [$affineScale, $affineShear, $affineRotate, $affineTranslate, $affineIdentity,];

    $count = 0;

    foreach ($examples as $example) {
        $draw->push();
        $draw->translate(($count % 2) * 250, intval($count / 2) * 250);
        $draw->translate(100, 100);
        $draw->affine($example);
        $draw->rectangle(-50, -50, 50, 50);
        $draw->pop();
        $count++;
    }

    //Create an image object which the draw commands can be rendered into
    $image = new \\Imagick();
    $image->newImage(500, 750, $backgroundColor);
    $image->setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $image->drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:39;s:7:"endLine";i:97;}',
    ),
    'arc' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:3:"arc";s:5:"lines";s:833:"function arc($strokeColor, $fillColor, $backgroundColor, $startX, $startY, $endX, $endY, $startAngle, $endAngle)
{
    //Create a ImagickDraw object to draw into.
    $draw = new \\ImagickDraw();
    $draw->setStrokeWidth(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(2);

    $draw->arc($startX, $startY, $endX, $endY, $startAngle, $endAngle);

    //Create an image object which the draw commands can be rendered into
    $image = new \\Imagick();
    $image->newImage(IMAGE_WIDTH, IMAGE_HEIGHT, $backgroundColor);
    $image->setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $image->drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:107;s:7:"endLine";i:132;}',
    ),
    'bezier' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:6:"bezier";s:5:"lines";s:1837:"function bezier($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $strokeColor = new \\ImagickPixel($strokeColor);
    $fillColor = new \\ImagickPixel($fillColor);

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);

    $smoothPointsSet = [
        [
            [\'x\' => 10.0 * 5, \'y\' => 10.0 * 5],
            [\'x\' => 30.0 * 5, \'y\' => 90.0 * 5],
            [\'x\' => 25.0 * 5, \'y\' => 10.0 * 5],
            [\'x\' => 50.0 * 5, \'y\' => 50.0 * 5],
        ],
        [
            [\'x\' => 50.0 * 5, \'y\' => 50.0 * 5],
            [\'x\' => 75.0 * 5, \'y\' => 90.0 * 5],
            [\'x\' => 70.0 * 5, \'y\' => 10.0 * 5],
            [\'x\' => 90.0 * 5, \'y\' => 40.0 * 5],
        ],
    ];

    foreach ($smoothPointsSet as $points) {
        $draw->bezier($points);
    }

    $disjointPoints = [
        [
            [\'x\' => 10 * 5, \'y\' => 10 * 5],
            [\'x\' => 30 * 5, \'y\' => 90 * 5],
            [\'x\' => 25 * 5, \'y\' => 10 * 5],
            [\'x\' => 50 * 5, \'y\' => 50 * 5],
        ],
        [
            [\'x\' => 50 * 5, \'y\' => 50 * 5],
            [\'x\' => 80 * 5, \'y\' => 50 * 5],
            [\'x\' => 70 * 5, \'y\' => 10 * 5],
            [\'x\' => 90 * 5, \'y\' => 40 * 5],
         ]
    ];
    $draw->translate(0, 200);

    foreach ($disjointPoints as $points) {
        $draw->bezier($points);
    }

    //Create an image object which the draw commands can be rendered into
    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $imagick->drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:134;s:7:"endLine";i:200;}',
    ),
    'circle' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:6:"circle";s:5:"lines";s:731:"function circle($strokeColor, $fillColor, $backgroundColor, $originX, $originY, $endX, $endY)
{
    //Create a ImagickDraw object to draw into.
    $draw = new \\ImagickDraw();

    $strokeColor = new \\ImagickPixel($strokeColor);
    $fillColor = new \\ImagickPixel($fillColor);

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);

    $draw->circle($originX, $originY, $endX, $endY);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:203;s:7:"endLine";i:229;}',
    ),
    'composite' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:9:"composite";s:5:"lines";s:1310:"function composite($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setFillOpacity(1);
    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeWidth(2);
    $draw->setFont("../fonts/CANDY.TTF");
    $draw->setFontSize(140);
    $draw->rectangle(0, 0, 1000, 300);
    $draw->setFillColor(\'white\');
    $draw->setfillopacity(1);
    $draw->annotation(50, 180, "Lorem Ipsum!");

//    $imagick = new \\Imagick(realpath("../images/TestImage.jpg"));
//    $draw->composite(\\Imagick::COMPOSITE_MULTIPLY, -500, -200, 2000, 600, $imagick);

    //$imagick->compositeImage($draw, 0, 0, 1000, 500);
    //$draw->composite(Imagick::COMPOSITE_COLORBURN, -500, -200, 2000, 600, $imagick);

    //Create an image object which the draw commands can be rendered into
    $imagick = new \\Imagick();
    $imagick->newImage(1000, 302, $backgroundColor);
    $imagick->setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $imagick->drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:232;s:7:"endLine";i:271;}',
    ),
    'ellipse' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:7:"ellipse";s:5:"lines";s:828:"function ellipse($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);

    $draw->ellipse(125, 70, 100, 50, 0, 360);
    $draw->ellipse(350, 70, 100, 50, 0, 315);

    $draw->push();
    $draw->translate(125, 250);
    $draw->rotate(30);
    $draw->ellipse(0, 0, 100, 50, 0, 360);
    $draw->pop();

    $draw->push();
    $draw->translate(350, 250);
    $draw->rotate(30);
    $draw->ellipse(0, 0, 100, 50, 0, 315);
    $draw->pop();

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:274;s:7:"endLine";i:308;}',
    ),
    'line' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:4:"line";s:5:"lines";s:533:"function line($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);

    $draw->line(125, 70, 100, 50);
    $draw->line(350, 170, 100, 150);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:311;s:7:"endLine";i:333;}',
    ),
    'matte' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:5:"matte";s:5:"lines";s:561:"function matte($strokeColor, $fillColor, $backgroundColor, $paintType)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);

    $draw->matte(120, 120, $paintType);
    $draw->rectangle(100, 100, 300, 200);
    

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:336;s:7:"endLine";i:359;}',
    ),
    'pathstart' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:9:"pathStart";s:5:"lines";s:1185:"function pathStart($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);

    $draw->pathStart();
    $draw->pathMoveToAbsolute(50, 50);
    $draw->pathLineToAbsolute(100, 50);
    $draw->pathLineToRelative(0, 50);
    $draw->pathLineToHorizontalRelative(-50);
    $draw->pathFinish();

    $draw->pathStart();
    $draw->pathMoveToAbsolute(50, 50);
    $draw->pathMoveToRelative(300, 0);
    $draw->pathLineToRelative(50, 0);
    $draw->pathLineToVerticalRelative(50);
    $draw->pathLineToHorizontalAbsolute(350);
    $draw->pathclose();
    $draw->pathFinish();

    $draw->pathStart();
    $draw->pathMoveToAbsolute(50, 300);
    $draw->pathCurveToAbsolute(50, 300, 100, 200, 300, 300);
    $draw->pathLineToVerticalAbsolute(350);
    $draw->pathFinish();

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:362;s:7:"endLine";i:405;}',
    ),
    'pathcurvetoquadraticbezierabsolute' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:34:"pathCurveToQuadraticBezierAbsolute";s:5:"lines";s:1531:"function pathCurveToQuadraticBezierAbsolute($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);

    $draw->pathStart();
    $draw->pathMoveToAbsolute(50, 250);

    // This specifies a quadratic bezier curve with the current position as the start
    // point, the control point is the first two params, and the end point is the last two params.
    $draw->pathCurveToQuadraticBezierAbsolute(
        150, 50,
        250, 250
    );

    // This specifies a quadratic bezier curve with the current position as the start
    // point, the control point is mirrored from the previous curves control point
    // and the end point is defined by the x, y values.
    $draw->pathCurveToQuadraticBezierSmoothAbsolute(
        450, 250
    );

    // This specifies a quadratic bezier curve with the current position as the start
    // point, the control point is mirrored from the previous curves control point
    // and the end point is defined relative from the current position by the x, y values.
    $draw->pathCurveToQuadraticBezierSmoothRelative(
        200, -100
    );

    $draw->pathFinish();

    $imagick = new \\Imagick();
    $imagick->newImage(700, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();

}
";s:11:"description";s:0:"";s:9:"startLine";i:408;s:7:"endLine";i:456;}',
    ),
    'point' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:5:"point";s:5:"lines";s:441:"function point($fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setFillColor($fillColor);

    for ($x = 0; $x < 10000; $x++) {
        $draw->point(rand(0, 500), rand(0, 500));
    }

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:459;s:7:"endLine";i:478;}',
    ),
    'polygon' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:7:"polygon";s:5:"lines";s:633:"function polygon($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeWidth(4);

    $draw->setFillColor($fillColor);

    $points = [[\'x\' => 40 * 5, \'y\' => 10 * 5], [\'x\' => 20 * 5, \'y\' => 20 * 5], [\'x\' => 70 * 5, \'y\' => 50 * 5], [\'x\' => 60 * 5, \'y\' => 15 * 5],];

    $draw->polygon($points);

    $image = new \\Imagick();
    $image->newImage(500, 300, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:481;s:7:"endLine";i:504;}',
    ),
    'polyline' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:8:"polyline";s:5:"lines";s:672:"function polyline($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(5);

    $points = [
        [\'x\' => 40 * 5, \'y\' => 10 * 5],
        [\'x\' => 20 * 5, \'y\' => 20 * 5],
        [\'x\' => 70 * 5, \'y\' => 50 * 5],
        [\'x\' => 60 * 5, \'y\' => 15 * 5]
    ];

    $draw->polyline($points);

    $image = new \\Imagick();
    $image->newImage(500, 300, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:507;s:7:"endLine";i:535;}',
    ),
    'popdefs' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:7:"popDefs";s:5:"lines";s:658:"function popDefs($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setstrokeOpacity(1);
    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);
    $draw->pushDefs();
    $draw->setStrokeColor(\'white\');
    $draw->rectangle(50, 50, 200, 200);
    $draw->popDefs();

    $draw->rectangle(300, 50, 450, 200);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:537;s:7:"endLine";i:563;}',
    ),
    'push' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:4:"push";s:5:"lines";s:675:"function push($strokeColor, $fillColor, $backgroundColor, $fillModifiedColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillModifiedColor);
    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);
    $draw->push();
    $draw->translate(50, 50);
    $draw->rectangle(200, 200, 300, 300);
    $draw->pop();
    $draw->setFillColor($fillColor);
    $draw->rectangle(200, 200, 300, 300);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:566;s:7:"endLine";i:590;}',
    ),
    'pushpattern' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:11:"pushPattern";s:5:"lines";s:1171:"function pushPattern($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(1);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(1);

    $draw->pushPattern("MyFirstPattern", 0, 0, 50, 50);
    for ($x = 0; $x < 50; $x += 10) {
        for ($y = 0; $y < 50; $y += 5) {
            $positionX = $x + (($y / 5) % 5);
            $draw->rectangle($positionX, $y, $positionX + 5, $y + 5);
        }
    }
    $draw->popPattern();

    $draw->setFillOpacity(0);
    $draw->rectangle(100, 100, 400, 400);
    $draw->setFillOpacity(1);

    $draw->setFillOpacity(1);

    $draw->push();
    $draw->setFillPatternURL(\'#MyFirstPattern\');
    $draw->setFillColor(\'yellow\');
    $draw->rectangle(100, 100, 400, 400);
    $draw->pop();

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:593;s:7:"endLine";i:637;}',
    ),
    'rectangle' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:9:"rectangle";s:5:"lines";s:611:"function rectangle($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();
    $strokeColor = new \\ImagickPixel($strokeColor);
    $fillColor = new \\ImagickPixel($fillColor);

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeWidth(2);

    $draw->rectangle(200, 200, 300, 300);
    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:640;s:7:"endLine";i:662;}',
    ),
    'render' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:6:"render";s:5:"lines";s:653:"function render($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $strokeColor = new \\ImagickPixel($strokeColor);
    $fillColor = new \\ImagickPixel($fillColor);

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(2);
    $draw->rectangle(200, 200, 300, 300);
    //$draw->render();
    $draw->translate(100, 100);
    $draw->render();

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:665;s:7:"endLine";i:690;}',
    ),
    'rotate' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:6:"rotate";s:5:"lines";s:596:"function rotate($strokeColor, $fillColor, $backgroundColor, $fillModifiedColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeOpacity(1);
    $draw->setFillColor($fillColor);
    $draw->rectangle(200, 200, 300, 300);
    $draw->setFillColor($fillModifiedColor);
    $draw->rotate(15);
    $draw->rectangle(200, 200, 300, 300);

    $image = new \\Imagick();
    $image->newImage(500, 500, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:692;s:7:"endLine";i:712;}',
    ),
    'roundrectangle' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:14:"roundRectangle";s:5:"lines";s:602:"function roundRectangle($strokeColor, $fillColor, $backgroundColor, $startX, $startY, $endX, $endY, $roundX, $roundY)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeWidth(2);

    $draw->roundRectangle($startX, $startY, $endX, $endY, $roundX, $roundY);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:714;s:7:"endLine";i:735;}',
    ),
    'scale' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:5:"scale";s:5:"lines";s:598:"function scale($strokeColor, $fillColor, $backgroundColor, $fillModifiedColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeWidth(4);
    $draw->setFillColor($fillColor);
    $draw->rectangle(200, 200, 300, 300);
    $draw->setFillColor($fillModifiedColor);
    $draw->scale(1.4, 1.4);
    $draw->rectangle(200, 200, 300, 300);

    $image = new \\Imagick();
    $image->newImage(500, 500, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:737;s:7:"endLine";i:757;}',
    ),
    'setclippath' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:11:"setClipPath";s:5:"lines";s:693:"function setClipPath($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeWidth(2);

    $clipPathName = \'testClipPath\';

    $draw->pushClipPath($clipPathName);
    $draw->rectangle(0, 0, 250, 250);
    $draw->popClipPath();
    $draw->setClipPath($clipPathName);
    $draw->rectangle(100, 100, 400, 400);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:759;s:7:"endLine";i:785;}',
    ),
    'setcliprule' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:11:"setClipRule";s:5:"lines";s:851:"function setClipRule($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeWidth(2);
    //\\Imagick::FILLRULE_EVENODD
    //\\Imagick::FILLRULE_NONZERO

    $clipPathName = \'testClipPath\';
    $draw->pushClipPath($clipPathName);
    $draw->setClipRule(\\Imagick::FILLRULE_EVENODD);
    $draw->rectangle(0, 0, 300, 500);
    $draw->rectangle(200, 0, 500, 500);
    $draw->popClipPath();
    $draw->setClipPath($clipPathName);
    $draw->rectangle(200, 200, 300, 300);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:788;s:7:"endLine";i:818;}',
    ),
    'setclipunits' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:12:"setClipUnits";s:5:"lines";s:823:"function setClipUnits($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeWidth(2);
    $clipPathName = \'testClipPath\';
    $draw->setClipUnits(\\Imagick::RESOLUTION_PIXELSPERINCH);
    $draw->pushClipPath($clipPathName);
    $draw->rectangle(0, 0, 250, 250);
    $draw->popClipPath();
    $draw->setClipPath($clipPathName);

    //RESOLUTION_PIXELSPERINCH
    //RESOLUTION_PIXELSPERCENTIMETER

    $draw->rectangle(200, 200, 300, 300);
    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:820;s:7:"endLine";i:849;}',
    ),
    'setfillalpha' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:12:"setFillAlpha";s:5:"lines";s:586:"function setFillAlpha($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeWidth(2);
    $draw->rectangle(100, 200, 200, 300);
    @$draw->setFillAlpha(0.4);
    $draw->rectangle(300, 200, 400, 300);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:851;s:7:"endLine";i:872;}',
    ),
    'setfillcolor' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:12:"setFillColor";s:5:"lines";s:591:"function setFillColor($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeWidth(1.5);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->rectangle(50, 50, 150, 150);

    $draw->setFillColor("rgb(200, 32, 32)");
    $draw->rectangle(200, 50, 300, 150);

    $image = new \\Imagick();
    $image->newImage(500, 500, $backgroundColor);
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:875;s:7:"endLine";i:898;}',
    ),
    'setfillopacity' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:14:"setFillOpacity";s:5:"lines";s:591:"function setFillOpacity($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeWidth(2);

    $draw->rectangle(100, 200, 200, 300);

    $draw->setFillOpacity(0.4);
    $draw->rectangle(300, 200, 400, 300);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:901;s:7:"endLine";i:924;}',
    ),
    'setfillrule' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:11:"setFillRule";s:5:"lines";s:1363:"function setFillRule($fillColor, $strokeColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeWidth(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $fillRules = [\\Imagick::FILLRULE_NONZERO, \\Imagick::FILLRULE_EVENODD];

    $points = 11;
    $size = 150;

    $draw->translate(175, 160);

    for ($x = 0; $x < 2; $x++) {
        $draw->setFillRule($fillRules[$x]);
        $draw->pathStart();
        for ($n = 0; $n < $points * 2; $n++) {
            if ($n >= $points) {
                $angle = fmod($n * 360 * 4 / $points, 360) * pi() / 180;
            }
            else {
                $angle = fmod($n * 360 * 3 / $points, 360) * pi() / 180;
            }

            $positionX = $size * sin($angle);
            $positionY = $size * cos($angle);

            if ($n == 0) {
                $draw->pathMoveToAbsolute($positionX, $positionY);
            }
            else {
                $draw->pathLineToAbsolute($positionX, $positionY);
            }
        }

        $draw->pathClose();
        $draw->pathFinish();

        $draw->translate(325, 0);
    }

    $image = new \\Imagick();
    $image->newImage(700, 320, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:927;s:7:"endLine";i:979;}',
    ),
    'setfont' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:7:"setFont";s:5:"lines";s:838:"function setFont($fillColor, $strokeColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);
    $draw->setFontSize(36);

    $draw->setFont("../fonts/Arial.ttf");
    $draw->annotation(50, 50, "Lorem Ipsum!");

    $draw->setFont("../fonts/Consolas.ttf");
    $draw->annotation(50, 100, "Lorem Ipsum!");

    $draw->setFont("../fonts/CANDY.TTF");
    $draw->annotation(50, 150, "Lorem Ipsum!");

    $draw->setFont("../fonts/Inconsolata-dz.otf");
    $draw->annotation(50, 200, "Lorem Ipsum!");

    $imagick = new \\Imagick();
    $imagick->newImage(500, 300, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:981;s:7:"endLine";i:1012;}',
    ),
    'setfontfamily' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:13:"setFontFamily";s:5:"lines";s:925:"function setFontFamily($fillColor, $strokeColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $strokeColor = new \\ImagickPixel($strokeColor);
    $fillColor = new \\ImagickPixel($fillColor);

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(2);

    $draw->setFontSize(48);

    $draw->setFontFamily("Times");
    $draw->annotation(50, 50, "Lorem Ipsum!");

    $draw->setFontFamily("AvantGarde");
    $draw->annotation(50, 100, "Lorem Ipsum!");

    $draw->setFontFamily("NewCenturySchlbk");
    $draw->annotation(50, 150, "Lorem Ipsum!");

    $draw->setFontFamily("Palatino");
    $draw->annotation(50, 200, "Lorem Ipsum!");

    $imagick = new \\Imagick();
    $imagick->newImage(450, 250, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1015;s:7:"endLine";i:1050;}',
    ),
    'setfontsize' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:11:"setFontSize";s:5:"lines";s:691:"function setFontSize($fillColor, $strokeColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(2);
    $draw->setFont("../fonts/Arial.ttf");

    $sizes = [24, 36, 48, 60, 72];

    foreach ($sizes as $size) {
        $draw->setFontSize($size);
        $draw->annotation(50, ($size * $size / 16), "Lorem Ipsum!");
    }

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1053;s:7:"endLine";i:1079;}',
    ),
    'setfontstretch' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:14:"setFontStretch";s:5:"lines";s:1014:"function setFontStretch($fillColor, $strokeColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(2);
    $draw->setFontSize(36);

    $fontStretchTypes = [
        \\Imagick::STRETCH_ULTRACONDENSED,
        \\Imagick::STRETCH_CONDENSED,
        \\Imagick::STRETCH_SEMICONDENSED,
        \\Imagick::STRETCH_SEMIEXPANDED,
        \\Imagick::STRETCH_EXPANDED,
        \\Imagick::STRETCH_EXTRAEXPANDED,
        \\Imagick::STRETCH_ULTRAEXPANDED,
        \\Imagick::STRETCH_ANY
    ];

    $offset = 0;
    foreach ($fontStretchTypes as $fontStretch) {
        $draw->setFontStretch($fontStretch);
        $draw->annotation(50, 75 + $offset, "Lorem Ipsum!");
        $offset += 50;
    }

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1082;s:7:"endLine";i:1118;}',
    ),
    'setfontstyle' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:12:"setFontStyle";s:5:"lines";s:759:"function setFontStyle($fillColor, $strokeColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(1);
    $draw->setFontSize(36);
    $draw->setFontStyle(\\Imagick::STYLE_NORMAL);
    $draw->annotation(50, 50, "Lorem Ipsum!");

    $draw->setFontStyle(\\Imagick::STYLE_ITALIC);
    $draw->annotation(50, 100, "Lorem Ipsum!");

    $draw->setFontStyle(\\Imagick::STYLE_OBLIQUE);
    $draw->annotation(50, 150, "Lorem Ipsum!");

    $imagick = new \\Imagick();
    $imagick->newImage(350, 300, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1121;s:7:"endLine";i:1146;}',
    ),
    'setfontweight' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:13:"setFontWeight";s:5:"lines";s:789:"function setFontWeight($fillColor, $strokeColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(1);

    $draw->setFontSize(36);

    $draw->setFontWeight(100);
    $draw->annotation(50, 50, "Lorem Ipsum!");

    $draw->setFontWeight(200);
    $draw->annotation(50, 100, "Lorem Ipsum!");

    $draw->setFontWeight(400);
    $draw->annotation(50, 150, "Lorem Ipsum!");

    $draw->setFontWeight(800);
    $draw->annotation(50, 200, "Lorem Ipsum!");

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1149;s:7:"endLine";i:1181;}',
    ),
    'setgravity' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:10:"setGravity";s:5:"lines";s:1052:"function setGravity($fillColor, $strokeColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(1);
    $draw->setFontSize(24);

    $gravitySettings = array(\\Imagick::GRAVITY_NORTHWEST => \'NorthWest\', \\Imagick::GRAVITY_NORTH => \'North\', \\Imagick::GRAVITY_NORTHEAST => \'NorthEast\', \\Imagick::GRAVITY_WEST => \'West\', \\Imagick::GRAVITY_CENTER => \'Centre\', \\Imagick::GRAVITY_SOUTHWEST => \'SouthWest\', \\Imagick::GRAVITY_SOUTH => \'South\', \\Imagick::GRAVITY_SOUTHEAST => \'SouthEast\', \\Imagick::GRAVITY_EAST => \'East\');

    $draw->setFont("../fonts/Arial.ttf");

    foreach ($gravitySettings as $type => $description) {
        $draw->setGravity($type);
        $draw->annotation(50, 50, \'"\' . $description . \'"\');
    }

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1184;s:7:"endLine";i:1210;}',
    ),
    'setstrokealpha' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:14:"setStrokeAlpha";s:5:"lines";s:624:"function setStrokeAlpha($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(4);
    $draw->line(100, 100, 400, 145);
    $draw->rectangle(100, 200, 225, 350);
    $draw->setStrokeOpacity(0.1);
    $draw->line(100, 120, 400, 165);
    $draw->rectangle(275, 200, 400, 350);

    $image = new \\Imagick();
    $image->newImage(500, 400, $backgroundColor);
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1213;s:7:"endLine";i:1236;}',
    ),
    'setstrokeantialias' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:18:"setStrokeAntialias";s:5:"lines";s:662:"function setStrokeAntialias($strokeColor, $fillColor, $backgroundColor)
{

    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(1);
    $draw->setStrokeAntialias(false);
    $draw->line(100, 100, 400, 105);

    $draw->line(100, 140, 400, 185);

    $draw->setStrokeAntialias(true);
    $draw->line(100, 110, 400, 115);
    $draw->line(100, 150, 400, 195);

    $image = new \\Imagick();
    $image->newImage(500, 250, $backgroundColor);
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1239;s:7:"endLine";i:1266;}',
    ),
    'setstrokecolor' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:14:"setStrokeColor";s:5:"lines";s:628:"function setStrokeColor($strokeColor, $fillColor, $backgroundColor)
{

    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(5);

    $draw->line(100, 100, 400, 145);
    $draw->rectangle(100, 200, 225, 350);

    $draw->setStrokeOpacity(0.1);
    $draw->line(100, 120, 400, 165);
    $draw->rectangle(275, 200, 400, 350);

    $image = new \\Imagick();
    $image->newImage(500, 400, $backgroundColor);
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1269;s:7:"endLine";i:1296;}',
    ),
    'setstrokedasharray' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:18:"setStrokeDashArray";s:5:"lines";s:947:"function setStrokeDashArray($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(4);

    $draw->setStrokeDashArray([10, 10]);
    $draw->rectangle(100, 50, 225, 175);

    $draw->setStrokeDashArray([20, 5, 20, 5, 5, 5,]);
    $draw->rectangle(275, 50, 400, 175);

    $draw->setStrokeDashArray([20, 5, 20, 5, 5]);
    $draw->rectangle(100, 200, 225, 350);

    $draw->setStrokeDashArray([1, 1, 1, 1, 2, 2, 3, 3, 5, 5, 8, 8, 13, 13, 21, 21, 34, 34, 55, 55, 89, 89, 144, 144, 233, 233, 377, 377, 610, 610, 987, 987, 1597, 1597, 2584, 2584, 4181, 4181,]);

    $draw->rectangle(275, 200, 400, 350);

    $image = new \\Imagick();
    $image->newImage(500, 400, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1299;s:7:"endLine";i:1329;}',
    ),
    'setstrokedashoffset' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:19:"setStrokeDashOffset";s:5:"lines";s:898:"function setStrokeDashOffset($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(4);
    $draw->setStrokeDashArray([20, 20]);
    $draw->setStrokeDashOffset(0);
    $draw->rectangle(100, 50, 225, 175);

    //Start the dash effect halfway through the solid portion
    $draw->setStrokeDashOffset(10);
    $draw->rectangle(275, 50, 400, 175);

    //Start the dash effect on the space portion
    $draw->setStrokeDashOffset(20);
    $draw->rectangle(100, 200, 225, 350);
    $draw->setStrokeDashOffset(5);
    $draw->rectangle(275, 200, 400, 350);

    $image = new \\Imagick();
    $image->newImage(500, 400, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1332;s:7:"endLine";i:1362;}',
    ),
    'setstrokelinecap' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:16:"setStrokeLineCap";s:5:"lines";s:729:"function setStrokeLineCap($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(25);

    $lineTypes = [\\Imagick::LINECAP_BUTT, \\Imagick::LINECAP_ROUND, \\Imagick::LINECAP_SQUARE,];

    $offset = 0;

    foreach ($lineTypes as $lineType) {
        $draw->setStrokeLineCap($lineType);
        $draw->line(50 + $offset, 50, 50 + $offset, 250);
        $offset += 50;
    }

    $imagick = new \\Imagick();
    $imagick->newImage(300, 300, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1364;s:7:"endLine";i:1390;}',
    ),
    'setstrokelinejoin' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:17:"setStrokeLineJoin";s:5:"lines";s:947:"function setStrokeLineJoin($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeWidth(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);

    $draw->setStrokeWidth(20);

    $offset = 220;

    $lineJoinStyle = [\\Imagick::LINEJOIN_MITER, \\Imagick::LINEJOIN_ROUND, \\Imagick::LINEJOIN_BEVEL,];

    for ($x = 0; $x < count($lineJoinStyle); $x++) {
        $draw->setStrokeLineJoin($lineJoinStyle[$x]);
        $points = [[\'x\' => 40 * 5, \'y\' => 10 * 5 + $x * $offset], [\'x\' => 20 * 5, \'y\' => 20 * 5 + $x * $offset], [\'x\' => 70 * 5, \'y\' => 50 * 5 + $x * $offset], [\'x\' => 40 * 5, \'y\' => 10 * 5 + $x * $offset],];

        $draw->polyline($points);
    }

    $image = new \\Imagick();
    $image->newImage(500, 700, $backgroundColor);
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1393;s:7:"endLine";i:1423;}',
    ),
    'setstrokemiterlimit' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:19:"setStrokeMiterLimit";s:5:"lines";s:1016:"function setStrokeMiterLimit($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeOpacity(0.6);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(10);

    $yOffset = 100;

    $draw->setStrokeLineJoin(\\Imagick::LINEJOIN_MITER);

    for ($y = 0; $y < 3; $y++) {
        $draw->setStrokeMiterLimit(40 * $y);

        $points = [[\'x\' => 22 * 3, \'y\' => 15 * 4 + $y * $yOffset], [\'x\' => 20 * 3, \'y\' => 20 * 4 + $y * $yOffset], [\'x\' => 70 * 5, \'y\' => 45 * 4 + $y * $yOffset],];

        $draw->polygon($points);
    }

    $image = new \\Imagick();
    $image->newImage(500, 500, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    $image->setImageType(\\Imagick::IMGTYPE_PALETTE);
    //TODO - this should either be everywhere or nowhere
    $image->setImageCompressionQuality(100);
    $image->stripImage();

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1426;s:7:"endLine";i:1461;}',
    ),
    'setstrokeopacity' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:16:"setStrokeOpacity";s:5:"lines";s:799:"function setStrokeOpacity($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeWidth(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(10);
    $draw->setStrokeOpacity(1);
    $draw->line(100, 80, 400, 125);
    $draw->rectangle(25, 200, 150, 350);
    $draw->setStrokeOpacity(0.5);
    $draw->line(100, 100, 400, 145);
    $draw->rectangle(200, 200, 325, 350);
    $draw->setStrokeOpacity(0.2);
    $draw->line(100, 120, 400, 165);
    $draw->rectangle(375, 200, 500, 350);

    $image = new \\Imagick();
    $image->newImage(550, 400, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1464;s:7:"endLine";i:1491;}',
    ),
    'setstrokewidth' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:14:"setStrokeWidth";s:5:"lines";s:619:"function setStrokeWidth($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeWidth(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->line(100, 100, 400, 145);
    $draw->rectangle(100, 200, 225, 350);
    $draw->setStrokeWidth(5);
    $draw->line(100, 120, 400, 165);
    $draw->rectangle(275, 200, 400, 350);

    $image = new \\Imagick();
    $image->newImage(500, 400, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1494;s:7:"endLine";i:1516;}',
    ),
    'settextalignment' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:16:"setTextAlignment";s:5:"lines";s:808:"function setTextAlignment($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(1);
    $draw->setFontSize(36);

    $draw->setTextAlignment(\\Imagick::ALIGN_LEFT);
    $draw->annotation(250, 75, "Lorem Ipsum!");
    $draw->setTextAlignment(\\Imagick::ALIGN_CENTER);
    $draw->annotation(250, 150, "Lorem Ipsum!");
    $draw->setTextAlignment(\\Imagick::ALIGN_RIGHT);
    $draw->annotation(250, 225, "Lorem Ipsum!");
    $draw->line(250, 0, 250, 500);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1519;s:7:"endLine";i:1544;}',
    ),
    'settextantialias' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:16:"setTextAntialias";s:5:"lines";s:756:"function setTextAntialias($fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();
    $draw->setStrokeColor(\'none\');
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(1);
    $draw->setFontSize(32);
    $draw->setTextAntialias(false);
    $draw->annotation(5, 30, "Lorem Ipsum!");
    $draw->setTextAntialias(true);
    $draw->annotation(5, 65, "Lorem Ipsum!");

    $imagick = new \\Imagick();
    $imagick->newImage(220, 80, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    //Scale the image so that people can see the aliasing.
    $imagick->scaleImage(220 * 6, 80 * 6);
    $imagick->cropImage(640, 480, 0, 0);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1547;s:7:"endLine";i:1572;}',
    ),
    'settextdecoration' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:17:"setTextDecoration";s:5:"lines";s:583:"function setTextDecoration($strokeColor, $fillColor, $backgroundColor, $textDecoration)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);
    $draw->setTextDecoration($textDecoration);
    $draw->annotation(50, 75, "Lorem Ipsum!");

    $imagick = new \\Imagick();
    $imagick->newImage(500, 200, $backgroundColor);
    $imagick->setImageFormat("png");
    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1575;s:7:"endLine";i:1595;}',
    ),
    'settextundercolor' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:17:"setTextUnderColor";s:5:"lines";s:632:"function setTextUnderColor($strokeColor, $fillColor, $backgroundColor, $textUnderColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);
    $draw->annotation(50, 75, "Lorem Ipsum!");
    $draw->setTextUnderColor($textUnderColor);
    $draw->annotation(50, 175, "Lorem Ipsum!");

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1598;s:7:"endLine";i:1620;}',
    ),
    'setvectorgraphics' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:17:"setVectorGraphics";s:5:"lines";s:872:"function setVectorGraphics()
{
    //Setup a draw object with some drawing in it.
    $draw = new \\ImagickDraw();
    $draw->setFillColor("red");
    $draw->circle(20, 20, 50, 50);
    $draw->setFillColor("blue");
    $draw->circle(50, 70, 50, 50);
    $draw->rectangle(50, 120, 80, 150);

    //Get the drawing as a string
    $SVG = $draw->getVectorGraphics();
    
    //$svg is a string, and could be saved anywhere a string can be saved

    //Use the saved drawing to generate a new draw object
    $draw2 = new \\ImagickDraw();
    //Apparently the SVG text is missing the root element.
    $draw2->setVectorGraphics("<root>".$SVG."</root>");

    $imagick = new \\Imagick();
    $imagick->newImage(200, 200, \'white\');
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw2);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1623;s:7:"endLine";i:1653;}',
    ),
    'setviewbox' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:10:"setViewBox";s:5:"lines";s:982:"function setViewBox($strokeColor, $fillColor, $backgroundColor)
{
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(2);
    $draw->setFontSize(72);

    /*
     
    Sets the overall canvas size to be recorded with the drawing vector data. Usually this will be specified using the same size as the canvas image. When the vector data is saved to SVG or MVG formats, the viewbox is use to specify the size of the canvas image that a viewer will render the vector data on.
    
     */

    $draw->circle(250, 250, 250, 0);
    $draw->setviewbox(0, 0, 200, 200);
    $draw->circle(125, 250, 250, 250);
    $draw->translate(250, 125);
    $draw->circle(0, 0, 125, 0);

    $imagick = new \\Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1656;s:7:"endLine";i:1687;}',
    ),
    'skewx' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:5:"skewX";s:5:"lines";s:670:"function skewX(
    $strokeColor, $fillColor, $backgroundColor, $fillModifiedColor,
    $startX, $startY, $endX, $endY, $skew
) {
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeWidth(2);
    $draw->setFillColor($fillColor);
    $draw->rectangle($startX, $startY, $endX, $endY);
    $draw->setFillColor($fillModifiedColor);
    $draw->skewX($skew);
    $draw->rectangle($startX, $startY, $endX, $endY);

    $image = new \\Imagick();
    $image->newImage(500, 500, $backgroundColor);
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1690;s:7:"endLine";i:1714;}',
    ),
    'skewy' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:5:"skewY";s:5:"lines";s:669:"function skewY(
    $strokeColor, $fillColor, $backgroundColor, $fillModifiedColor,
    $startX, $startY, $endX, $endY, $skew
) {
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeWidth(2);
    $draw->setFillColor($fillColor);
    $draw->rectangle($startX, $startY, $endX, $endY);
    $draw->setFillColor($fillModifiedColor);
    $draw->skewY($skew);
    $draw->rectangle($startX, $startY, $endX, $endY);

    $image = new \\Imagick();
    $image->newImage(500, 500, $backgroundColor);
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1717;s:7:"endLine";i:1740;}',
    ),
    'translate' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:11:"ImagickDraw";s:12:"functionName";s:9:"translate";s:5:"lines";s:687:"function translate(
    $strokeColor, $fillColor, $backgroundColor, $fillModifiedColor,
    $startX, $startY, $endX, $endY, $translateX, $translateY
) {
    $draw = new \\ImagickDraw();

    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->rectangle($startX, $startY, $endX, $endY);

    $draw->setFillColor($fillModifiedColor);
    $draw->translate($translateX, $translateY);
    $draw->rectangle($startX, $startY, $endX, $endY);

    $image = new \\Imagick();
    $image->newImage(500, 500, $backgroundColor);
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:1743;s:7:"endLine";i:1767;}',
    ),
  ),
  'imagickkernel' => 
  array (
    'addunitykernel' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:14:"addUnityKernel";s:5:"lines";s:692:"        $matrix = [
            [-1, 0, -1],
            [0, 4, 0],
            [-1, 0, -1],
        ];

        $kernel = \\ImagickKernel::fromMatrix($matrix);
        $kernel->scale(1, \\Imagick::NORMALIZE_KERNEL_VALUE);
        $output = "Before adding unity kernel: <br/>";
        $output .= renderKernelTable($kernel->getMatrix());
        $kernel->addUnityKernel(0.5);
        $output .= "After adding unity kernel: <br/>";
        $output .= renderKernelTable($kernel->getMatrix());

        $kernel->scale(1, \\Imagick::NORMALIZE_KERNEL_VALUE);
        $output .= "After renormalizing kernel: <br/>";
        $output .= renderKernelTable($kernel->getMatrix());

        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:14;s:7:"endLine";i:34;}',
      1 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:14:"addUnityKernel";s:5:"lines";s:428:"function addUnityKernel($imagePath)
{
    $matrix = [
        [-1, 0, -1],
        [ 0, 4,  0],
        [-1, 0, -1],
    ];

    $kernel = ImagickKernel::fromMatrix($matrix);

    $kernel->scale(4, \\Imagick::NORMALIZE_KERNEL_VALUE);
    $kernel->addUnityKernel(0.5);


    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->filter($kernel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

}
";s:11:"description";s:0:"";s:9:"startLine";i:276;s:7:"endLine";i:297;}',
    ),
    'addkernel' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:9:"addKernel";s:5:"lines";s:515:"function addKernel($imagePath)
{
    $matrix1 = [
        [-1, -1, -1],
        [ 0,  0,  0],
        [ 1,  1,  1],
    ];

    $matrix2 = [
        [-1,  0,  1],
        [-1,  0,  1],
        [-1,  0,  1],
    ];

    $kernel1 = ImagickKernel::fromMatrix($matrix1);
    $kernel2 = ImagickKernel::fromMatrix($matrix2);
    $kernel1->addKernel($kernel2);

    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->filter($kernel1);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

}
";s:11:"description";s:0:"";s:9:"startLine";i:248;s:7:"endLine";i:273;}',
    ),
    'frommatrix' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"fromMatrix";s:5:"lines";s:373:"function createFromMatrix()
{
    $matrix = [
        [0.5, 0, 0.2],
        [0, 1, 0],
        [0.9, 0, false],
    ];

    $kernel = \\ImagickKernel::fromMatrix($matrix);

    return $kernel;
}
    
function fromMatrix()
{
    $kernel = createFromMatrix();
    $imagick = renderKernel($kernel);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:299;s:7:"endLine";i:321;}',
    ),
    'frombuiltin' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:11:"fromBuiltIn";s:5:"lines";s:985:"function createFromBuiltin($kernelType, $kernelFirstTerm, $kernelSecondTerm, $kernelThirdTerm)
{
    $string = \'\';

    if ($kernelFirstTerm != false && strlen(trim($kernelFirstTerm)) != 0) {
        $string .= $kernelFirstTerm;

        if ($kernelSecondTerm != false && strlen(trim($kernelSecondTerm)) != 0) {
            $string .= \',\'.$kernelSecondTerm;
            if ($kernelThirdTerm != false && strlen(trim($kernelThirdTerm)) != 0) {
                $string .= \',\'.$kernelThirdTerm;
            }
        }
    }

    $kernel = ImagickKernel::fromBuiltIn(
        $kernelType, //\\Imagick::KERNEL_DIAMOND,
        $string
    );

    return $kernel;
}
    
function fromBuiltin($kernelType, $kernelFirstTerm, $kernelSecondTerm, $kernelThirdTerm)
{
    $diamondKernel = createFromBuiltin($kernelType, $kernelFirstTerm, $kernelSecondTerm, $kernelThirdTerm);
    $imagick = renderKernel($diamondKernel);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:323;s:7:"endLine";i:355;}',
    ),
    'getmatrix' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:9:"getMatrix";s:5:"lines";s:383:"        $output = "The built-in kernel name \'ring\' with parameters of \'2,3.5\':<br/>";
        $kernel = \\ImagickKernel::fromBuiltIn(
            \\Imagick::KERNEL_RING,
            "2,3.5"
        );
        $matrix = $kernel->getMatrix();
        $output .= renderKernelTable($matrix);

        $output .= "Or as an image: " . $this->renderCustomImageURL();

        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:14;s:7:"endLine";i:26;}',
    ),
    'scale' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:5:"scale";s:5:"lines";s:1090:"        $output = "";

        $matrix = [
            [-1, 0, -1],
            [0, 4, 0],
            [-1, 0, -1],
        ];

        $kernel = \\ImagickKernel::fromMatrix($matrix);
        $kernelClone = clone $kernel;

        $output .= "Start kernel<br/>";
        $output .= renderKernelTable($kernel->getMatrix());


        $output .= "Scaling with NORMALIZE_KERNEL_VALUE. The  <br/>";
        $kernel->scale(2, \\Imagick::NORMALIZE_KERNEL_VALUE);
        $output .= renderKernelTable($kernel->getMatrix());


        $kernel = clone $kernelClone;
        $output .= "Scaling by percent<br/>";
        $kernel->scale(2, \\Imagick::NORMALIZE_KERNEL_PERCENT);
        $output .= renderKernelTable($kernel->getMatrix());


        $matrix2 = [
            [-1, -1, 1],
            [-1, false, 1],
            [1, 1, 1],
        ];

        $kernel = \\ImagickKernel::fromMatrix($matrix2);
        $output .= "Scaling by correlate<br/>";
        $kernel->scale(1, \\Imagick::NORMALIZE_KERNEL_CORRELATE);
        $output .= renderKernelTable($kernel->getMatrix());


        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:23;s:7:"endLine";i:63;}',
    ),
    'separate' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:8:"separate";s:5:"lines";s:686:"        $matrix = [
            [-1, 0, -1],
            [0, 4, 0],
            [-1, 0, -1],
        ];

        $kernel = \\ImagickKernel::fromMatrix($matrix);
        $kernel->scale(4, \\Imagick::NORMALIZE_KERNEL_VALUE);
        $diamondKernel = \\ImagickKernel::fromBuiltIn(
            \\Imagick::KERNEL_DIAMOND,
            "2"
        );

        $kernel->addKernel($diamondKernel);

        $kernelList = $kernel->separate();

        $output = \'\';
        $count = 0;
        foreach ($kernelList as $kernel) {
            $output .= "<br/>Kernel $count<br/>";
            $output .= renderKernelTable($kernel->getMatrix());
            $count++;
        }

        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:14;s:7:"endLine";i:41;}',
    ),
    'morphology' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:397:"        $matrix = [
            [0.0, 0.5, 0.0],
            [0.5, 1.0, 0.5],
            [0.0, 0.5, 0.0],
        ];
        $imagick = new \\Imagick(realpath("./images/character.png"));
        $kernel = \\ImagickKernel::fromMatrix($matrix);
        $imagick->morphology(\\Imagick::MORPHOLOGY_CONVOLVE, 2, $kernel);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:125;s:7:"endLine";i:136;}',
      1 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:398:"        $matrix = [
            [0.0, 0.5, 0.0],
            [0.5, 1.0, 0.5],
            [0.0, 0.5, 0.0],
        ];
        $imagick = new \\Imagick(realpath("./images/character.png"));
        $kernel = \\ImagickKernel::fromMatrix($matrix);
        $imagick->morphology(\\Imagick::MORPHOLOGY_CORRELATE, 2, $kernel);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:142;s:7:"endLine";i:153;}',
      2 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:276:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_ERODE, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:159;s:7:"endLine";i:165;}',
      3 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:279:"        $canvas = $this->getCharacter();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "1");
        $canvas->morphology(\\Imagick::MORPHOLOGY_ERODE_INTENSITY, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:171;s:7:"endLine";i:177;}',
      4 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:277:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DILATE, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:182;s:7:"endLine";i:188;}',
      5 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:280:"        $canvas = $this->getCharacter();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "1");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DILATE_INTENSITY, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:193;s:7:"endLine";i:199;}',
      6 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:316:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_CHEBYSHEV, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:205;s:7:"endLine";i:212;}',
      7 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:316:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_MANHATTAN, "5");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:217;s:7:"endLine";i:224;}',
      8 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:316:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGONAL, "5");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:229;s:7:"endLine";i:236;}',
      9 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:316:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_EUCLIDEAN, "4");
        $canvas->morphology(\\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:241;s:7:"endLine";i:248;}',
      10 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:275:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_EDGE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:253;s:7:"endLine";i:259;}',
      11 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:486:"//        As a result you will see that \'Open\' smoothed the outline, by rounding off any sharp points, and remove any parts that is smaller than the shape used. It will also disconnect or \'open\' any thin bridges.

        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\\Imagick::MORPHOLOGY_OPEN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:264;s:7:"endLine";i:272;}',
      12 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:489:"//        As a result you will see that \'Open\' smoothed the outline, by rounding off any sharp points, and remove any parts that is smaller than the shape used. It will also disconnect or \'open\' any thin bridges.

        $canvas = $this->getCharacter();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\\Imagick::MORPHOLOGY_OPEN_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:278;s:7:"endLine";i:286;}',
      13 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:480:"        //The basic use of the \'Close\' method is to reduce or remove any \'holes\' or \'gaps\' about the size of the kernel \'Structure Element\'. That is \'close\' parts of the background that are about that size.
        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\\Imagick::MORPHOLOGY_CLOSE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:291;s:7:"endLine";i:298;}',
      14 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:483:"        //The basic use of the \'Close\' method is to reduce or remove any \'holes\' or \'gaps\' about the size of the kernel \'Structure Element\'. That is \'close\' parts of the background that are about that size.
        $canvas = $this->getCharacter();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\\Imagick::MORPHOLOGY_CLOSE_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:303;s:7:"endLine";i:310;}',
      15 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:277:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_SMOOTH, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:316;s:7:"endLine";i:322;}',
      16 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:278:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_EDGE_IN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:327;s:7:"endLine";i:333;}',
      17 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:279:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\\Imagick::MORPHOLOGY_EDGE_OUT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:338;s:7:"endLine";i:344;}',
      18 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:275:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "5");
        $canvas->morphology(\\Imagick::MORPHOLOGY_TOP_HAT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:349;s:7:"endLine";i:355;}',
      19 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:412:"        $canvas = $this->getCharacterOutline();
        //This finds all the pixels with 3 pixels of the right edge
        $matrix = [[1, false, false, 0]];
        $kernel = \\ImagickKernel::fromMatrix(
            $matrix,
            [0, 0]
        );
        $canvas->morphology(\\Imagick::MORPHOLOGY_HIT_AND_MISS, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:371;s:7:"endLine";i:382;}',
      20 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:409:"        $canvas = $this->getCharacterOutline();
        $leftEdgeKernel = \\ImagickKernel::fromMatrix([[0, 1]], [1, 0]);
        $rightEdgeKernel = \\ImagickKernel::fromMatrix([[1, 0]], [0, 0]);
        $leftEdgeKernel->addKernel($rightEdgeKernel);

        $canvas->morphology(\\Imagick::MORPHOLOGY_THINNING, 3, $leftEdgeKernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:388;s:7:"endLine";i:397;}',
      21 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:408:"        $canvas = $this->getCharacterOutline();
        $leftEdgeKernel = \\ImagickKernel::fromMatrix([[0, 1]], [1, 0]);
        $rightEdgeKernel = \\ImagickKernel::fromMatrix([[1, 0]], [0, 0]);
        $leftEdgeKernel->addKernel($rightEdgeKernel);

        $canvas->morphology(\\Imagick::MORPHOLOGY_THICKEN, 3, $leftEdgeKernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:402;s:7:"endLine";i:411;}',
      22 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:533:"        $canvas = $this->getCharacterOutline();
        $diamondKernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DIAMOND, "1");
        $convexKernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_CONVEX_HULL, "");

        $canvas->morphology(\\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);
        $canvas->morphology(\\Imagick::MORPHOLOGY_THICKEN, -1, $convexKernel);
        $canvas->morphology(\\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);

        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:416;s:7:"endLine";i:427;}',
      23 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:312:"        $canvas = $this->getCharacterOutline();
        $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_DISK, "2");
        $canvas->morphology(\\Imagick::MORPHOLOGY_ITERATIVE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:432;s:7:"endLine";i:439;}',
      24 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:13:"ImagickKernel";s:12:"functionName";s:10:"morphology";s:5:"lines";s:758:"        $imagick = new \\Imagick(realpath("./images/character.png"));
        $character = new \\Imagick();
        $character->newPseudoImage(
            $imagick->getImageWidth(),
            $imagick->getImageHeight(),
            "canvas:white"
        );
        $canvas = new \\Imagick();
        $canvas->newPseudoImage(
            $imagick->getImageWidth(),
            $imagick->getImageHeight(),
            "canvas:black"
        );

        $character->compositeimage(
            $imagick,
            \\Imagick::COMPOSITE_COPYOPACITY,
            0, 0
        );
        $canvas->compositeimage(
            $character,
            \\Imagick::COMPOSITE_ATOP,
            0, 0
        );
        $canvas->setFormat(\'png\');

        return $canvas;
";s:11:"description";s:0:"";s:9:"startLine";i:452;s:7:"endLine";i:480;}',
    ),
  ),
  'imagickpixel' => 
  array (
    'construct' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:9:"construct";s:5:"lines";s:1674:"function construct()
{
    $columns = 4;
    
    $exampleColors = array(
        "rgba(100%, 0%, 0%, 0.5)",
        "hsb(33.3333%, 100%,  75%)", // medium green
        "hsl(120, 255,   191.25)", //medium green
        "graya(50%, 0.5)", //  semi-transparent mid gray
        "LightCoral", "none", //"cmyk(0.9, 0.48, 0.83, 0.50)",
        "#f00", //  #rgb
        "#ff0000", //  #rrggbb
        "#ff0000ff", //  #rrggbbaa
        "#ffff00000000", //  #rrrrggggbbbb
        "#ffff00000000ffff", //  #rrrrggggbbbbaaaa
        "rgb(255, 0, 0)", //  an integer in the range 0—255 for each component
        "rgb(100.0%, 0.0%, 0.0%)", //  a float in the range 0—100% for each component
        "rgb(255, 0, 0)", //  range 0 - 255
        "rgba(255, 0, 0, 1.0)", //  the same, with an explicit alpha value
        "rgb(100%, 0%, 0%)", //  range 0.0% - 100.0%
        "rgba(100%, 0%, 0%, 1.0)", //  the same, with an explicit alpha value
    );

    $draw = new \\ImagickDraw();
    $count = 0;
    $black = new \\ImagickPixel(\'rgb(0, 0, 0)\');

    foreach ($exampleColors as $exampleColor) {
        $color = new \\ImagickPixel($exampleColor);

        $draw->setstrokewidth(1.0);
        $draw->setStrokeColor($black);
        $draw->setFillColor($color);
        $offsetX = ($count % $columns) * 50 + 5;
        $offsetY = intval($count / $columns) * 50 + 5;
        $draw->rectangle(0 + $offsetX, 0 + $offsetY, 40 + $offsetX, 40 + $offsetY);
        $count++;
    }

    $image = new \\Imagick();
    $image->newImage(350, 350, "blue");
    $image->setImageFormat("png");
    $image->drawImage($draw);
    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:36;s:7:"endLine";i:83;}',
    ),
    'setcolor' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:8:"setColor";s:5:"lines";s:564:"function setColor()
{
    $draw = new \\ImagickDraw();

    $strokeColor = new \\ImagickPixel(\'green\');
    $fillColor = new \\ImagickPixel();
    $fillColor->setColor(\'rgba(100%, 75%, 0%, 1.0)\');

    $draw->setstrokewidth(3.0);
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->rectangle(200, 200, 300, 300);

    $image = new \\Imagick();
    $image->newImage(500, 500, "SteelBlue2");
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:86;s:7:"endLine";i:109;}',
    ),
    'setcolorvalue' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:13:"setColorValue";s:5:"lines";s:512:"function setColorValue()
{
    $image = new \\Imagick();
    $draw = new \\ImagickDraw();

    $color = new \\ImagickPixel(\'blue\');
    $color->setcolorValue(\\Imagick::COLOR_RED, 128);

    $draw->setstrokewidth(1.0);
    $draw->setStrokeColor($color);
    $draw->setFillColor($color);
    $draw->rectangle(200, 200, 300, 300);

    $image->newImage(500, 500, "SteelBlue2");
    $image->setImageFormat("png");
    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:112;s:7:"endLine";i:133;}',
    ),
    'setcolorvaluequantum' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:20:"setColorValueQuantum";s:5:"lines";s:617:"function setColorValueQuantum()
{
    $image = new \\Imagick();

    $quantumRange = $image->getQuantumRange();

    $draw = new \\ImagickDraw();
    $color = new \\ImagickPixel(\'blue\');
    $color->setcolorValueQuantum(\\Imagick::COLOR_RED, 128 * $quantumRange[\'quantumRangeLong\'] / 256);

    $draw->setstrokewidth(1.0);
    $draw->setStrokeColor($color);
    $draw->setFillColor($color);
    $draw->rectangle(200, 200, 300, 300);

    $image->newImage(500, 500, "SteelBlue2");
    $image->setImageFormat("png");

    $image->drawImage($draw);

    header("Content-Type: image/png");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:136;s:7:"endLine";i:160;}',
    ),
    'getcolor' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:8:"getColor";s:5:"lines";s:452:"        $color = new \\ImagickPixel(\'brown\');
        $color->setColorValue(\\Imagick::COLOR_ALPHA, 0.25);

        echo "<h4>Standard values</h4>" . PHP_EOL;
        foreach ($color->getColor() as $key => $value) {
            echo "$key : $value <br/>";
        }

        echo "<br/>";

        echo "<h4>Normalized values</h4>" . PHP_EOL;
        foreach ($color->getColor(true) as $key => $value) {
            echo "$key : $value <br/>";
        }
";s:11:"description";s:0:"";s:9:"startLine";i:11;s:7:"endLine";i:26;}',
    ),
    'getcolorasstring' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:16:"getColorAsString";s:5:"lines";s:312:"        $output = "Create an ImagickPixel with the predefined color \'brown\' and output the result of `getColorAsString`. <br/>";
        $color = new \\ImagickPixel(\'brown\');
        $color->setColorValue(\\Imagick::COLOR_ALPHA, 64 / 256.0);
        $output .= $color->getColorAsString();

        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:20;s:7:"endLine";i:27;}',
    ),
    'getcolorcount' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:13:"getColorCount";s:5:"lines";s:300:"        $output = "I have pretty much no idea what this function is meant " .
            "to do...if you know I\'d love to hear.<br/>";

        $color = new \\ImagickPixel(\'red\');
        $colorInfo = $color->getColorCount();
        $output .= var_export($colorInfo, true);

        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:10;s:7:"endLine";i:19;}',
    ),
    'getcolorvalue' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:13:"getColorValue";s:5:"lines";s:830:"        $color = new \\ImagickPixel(\'rgba(90%, 20%, 20%, 0.75)\');

        echo "Alpha value is " . $color->getColorValue(\\Imagick::COLOR_ALPHA) . "<br/>";
        echo "" . "<br/>";
        echo "Red value is " . $color->getColorValue(\\Imagick::COLOR_RED) . "<br/>";
        echo "Green value is " . $color->getColorValue(\\Imagick::COLOR_GREEN) . "<br/>";
        echo "Blue value is " . $color->getColorValue(\\Imagick::COLOR_BLUE) . "<br/>";
        echo "" . "<br/>";
        echo "Cyan value is " . $color->getColorValue(\\Imagick::COLOR_CYAN) . "<br/>";
        echo "Magenta value is " . $color->getColorValue(\\Imagick::COLOR_MAGENTA) . "<br/>";
        echo "Yellow value is " . $color->getColorValue(\\Imagick::COLOR_YELLOW) . "<br/>";
        echo "Black value is " . $color->getColorValue(\\Imagick::COLOR_BLACK) . "<br/>";
";s:11:"description";s:0:"";s:9:"startLine";i:9;s:7:"endLine";i:22;}',
    ),
    'getcolorvaluequantum' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:20:"getColorValueQuantum";s:5:"lines";s:526:"        $color = new \\ImagickPixel(\'rgb(128, 5, 255)\');
        $colorRed = $color->getColorValueQuantum(\\Imagick::COLOR_RED);
        $colorGreen = $color->getColorValueQuantum(\\Imagick::COLOR_GREEN);
        $colorBlue = $color->getColorValueQuantum(\\Imagick::COLOR_BLUE);
        $colorAlpha = $color->getColorValueQuantum(\\Imagick::COLOR_ALPHA);

        printf(
            "Red: %s Green: %s  Blue %s Alpha: %s",
            $colorRed,
            $colorGreen,
            $colorBlue,
            $colorAlpha
        );
";s:11:"description";s:0:"";s:9:"startLine";i:10;s:7:"endLine";i:24;}',
    ),
    'gethsl' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:6:"getHSL";s:5:"lines";s:347:"        $colorString = \'rgb(90%, 10%, 10%)\';

        $output = "The result of getHSL for the color \'$colorString\' is:<br/>";

        $color = new \\ImagickPixel($colorString);
        $colorInfo = $color->getHSL();

        foreach ($colorInfo as $key => $value) {
            $output .= "$key : $value <br/>";
        }

        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:9;s:7:"endLine";i:22;}',
    ),
    'issimilar' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:9:"isSimilar";s:5:"lines";s:2762:"        // The tests below are written with the maximum distance expressed as 255
        // so we need to scale them by the square root of 3 - the diagonal length
        // of a unit cube.
        $root3 = 1.732050807568877;

        $tests = array(
            [\'rgb(245, 0, 0)\', \'rgb(255, 0, 0)\', 9 / $root3, false,],
            [\'rgb(245, 0, 0)\', \'rgb(255, 0, 0)\', 10 / $root3, true,],
            [\'rgb(0, 0, 0)\', \'rgb(7, 7, 0)\', 9 / $root3, false,],
            [\'rgb(0, 0, 0)\', \'rgb(7, 7, 0)\', 10 / $root3, true,],
            [\'rgba(0, 0, 0, 1)\', \'rgba(7, 7, 0, 1)\', 9 / $root3, false,],
            [\'rgba(0, 0, 0, 1)\', \'rgba(7, 7, 0, 1)\', 10 / $root3, true,],
            [\'rgb(128, 128, 128)\', \'rgb(128, 128, 120)\', 7 / $root3, false,],
            [\'rgb(128, 128, 128)\', \'rgb(128, 128, 120)\', 8 / $root3, true,],
            [\'rgb(0, 0, 0)\', \'rgb(255, 255, 255)\', 254.9, false,],
            [\'rgb(0, 0, 0)\', \'rgb(255, 255, 255)\', 255, true,],
            [\'rgb(255, 0, 0)\', \'rgb(0, 255, 255)\', 254.9, false,],
            [\'rgb(255, 0, 0)\', \'rgb(0, 255, 255)\', 255, true,],
            [\'black\', \'rgba(0, 0, 0)\', 0.0, true],
            [\'black\', \'rgba(10, 0, 0, 1.0)\', 10.0 / $root3, true],);

        $output = "<table width=\'100%\' class=\'infoTable\'><thead>
                <tr>
                <th>
                Color 1
                </th>
                <th>
                Color 2
                </th>
                <th>
                    Test distance * 255
                </th>
                <th>
                    Is within distance
                </th>
                </tr>
        </thead>";

        $output .= "<tbody>";

        foreach ($tests as $testInfo) {
            $color1 = $testInfo[0];
            $color2 = $testInfo[1];
            $distance = $testInfo[2];
            $expectation = $testInfo[3];
            $testDistance = ($distance / 255.0);

            $color1Pixel = new \\ImagickPixel($color1);
            $color2Pixel = new \\ImagickPixel($color2);

            $isSimilar = $color1Pixel->isPixelSimilar($color2Pixel, $testDistance);

            if ($isSimilar !== $expectation) {
                echo "Test distance failed. Color [$color1] compared to color [$color2] is not within distance $testDistance FAILED." . NL;
            }

            $layout = "<tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td style=\'text-align: center;\'>%s</td>
            </tr>";

            $output .= sprintf(
                $layout,
                $color1,
                $color2,
                $distance,
                $isSimilar ? \'yes\' : \'no\'
            );
        }

        $output .= "</tbody></table>";

        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:18;s:7:"endLine";i:94;}',
    ),
    'sethsl' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:12:"ImagickPixel";s:12:"functionName";s:6:"setHSL";s:5:"lines";s:1085:"
        $output = "This example creates a red color, rotates the hue by 180 degrees and sets the new color.<br/>";

        //Create an almost pure red color
        $color = new \\ImagickPixel(\'rgb(90%, 10%, 10%)\');
        $originalColor = clone $color;

        //Get it\'s HSL values
        $colorInfo = $color->getHSL();

        //Rotate the hue by 180 degrees
        $newHue = $colorInfo[\'hue\'] + 0.5;
        if ($newHue > 1) {
            $newHue = $newHue - 1;
        }

        //Set the ImagickPixel to the new color
        $color->setHSL($newHue, $colorInfo[\'saturation\'], $colorInfo[\'luminosity\']);


        $output .= "<h3>Original color</h3>";
        $colorInfo = $originalColor->getcolor();
        foreach ($colorInfo as $key => $value) {
            $output .= "$key : $value <br/>";
        }


        $output .= "<h3>Rotated color</h3>";
        //Check that the new color is blue/green
        $colorInfo = $color->getcolor();
        foreach ($colorInfo as $key => $value) {
            $output .= "$key : $value <br/>";
        }

        return $output;
";s:11:"description";s:0:"";s:9:"startLine";i:10;s:7:"endLine";i:46;}',
    ),
  ),
  'imagickpixeliterator' => 
  array (
    'clear' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:20:"ImagickPixelIterator";s:12:"functionName";s:5:"clear";s:5:"lines";s:754:"function clear($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelRegionIterator(100, 100, 250, 200);

    /* Loop through pixel rows */
    foreach ($imageIterator as $pixels) {
        /** @var $pixel \\ImagickPixel */
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $column => $pixel) {
            if ($column % 2) {
                /* Paint every second pixel black*/
                $pixel->setColor("rgba(0, 0, 0, 0)");
            }
        }
        /* Sync the iterator, this is important to do on each iteration */
        $imageIterator->syncIterator();
    }

    $imageIterator->clear();

    header("Content-Type: image/jpg");
    echo $imagick;
}
";s:11:"description";s:0:"";s:9:"startLine";i:78;s:7:"endLine";i:103;}',
    ),
    'construct' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:20:"ImagickPixelIterator";s:12:"functionName";s:9:"construct";s:5:"lines";s:715:"function construct($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imageIterator = new \\ImagickPixelIterator($imagick);

    /* Loop through pixel rows */
    foreach ($imageIterator as $pixels) {
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $column => $pixel) {
            /** @var $pixel \\ImagickPixel */
            if ($column % 2) {
                /* Paint every second pixel black*/
                $pixel->setColor("rgba(0, 0, 0, 0)");
            }
        }
        /* Sync the iterator, this is important to do on each iteration */
        $imageIterator->syncIterator();
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}
";s:11:"description";s:0:"";s:9:"startLine";i:106;s:7:"endLine";i:129;}',
    ),
    'getnextiteratorrow' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:20:"ImagickPixelIterator";s:12:"functionName";s:18:"getNextIteratorRow";s:5:"lines";s:825:"function getNextIteratorRow($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelIterator();

    $count = 0;
    while (($pixels = $imageIterator->getNextIteratorRow())) {
        if (($count % 3) == 0) {
            /* Loop through the pixels in the row (columns) */
            foreach ($pixels as $column => $pixel) {
                /** @var $pixel \\ImagickPixel */
                if ($column % 2) {
                    /* Paint every second pixel black*/
                    $pixel->setColor("rgba(0, 0, 0, 0)");
                }
            }
            /* Sync the iterator, this is important to do on each iteration */
            $imageIterator->syncIterator();
        }

        $count += 1;
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}
";s:11:"description";s:0:"";s:9:"startLine";i:132;s:7:"endLine";i:159;}',
    ),
    'resetiterator' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:20:"ImagickPixelIterator";s:12:"functionName";s:13:"resetIterator";s:5:"lines";s:1392:"function resetIterator($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));

    $imageIterator = $imagick->getPixelIterator();

    /* Loop through pixel rows */
    foreach ($imageIterator as $pixels) {
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $column => $pixel) {
            /** @var $pixel \\ImagickPixel */
            if ($column % 2) {
                /* Make every second pixel 25% red*/
                $pixel->setColorValue(\\Imagick::COLOR_RED, 64);
            }
        }
        /* Sync the iterator, this is important to do on each iteration */
        $imageIterator->syncIterator();
    }

    $imageIterator->resetiterator();

    /* Loop through pixel rows */
    foreach ($imageIterator as $pixels) {
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $column => $pixel) {
            /** @var $pixel \\ImagickPixel */
            if ($column % 3) {
                $pixel->setColorValue(\\Imagick::COLOR_BLUE, 64); /* Make every second pixel a little blue*/
                //$pixel->setColor("rgba(0, 0, 128, 0)"); /* Paint every second pixel black*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    $imageIterator->clear();

    header("Content-Type: image/jpg");
    echo $imagick;
}
";s:11:"description";s:0:"";s:9:"startLine";i:162;s:7:"endLine";i:203;}',
    ),
    'setiteratorrow' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:20:"ImagickPixelIterator";s:12:"functionName";s:14:"setIteratorRow";s:5:"lines";s:739:"function setIteratorRow($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelRegionIterator(200, 100, 200, 200);

    for ($x = 0; $x < 20; $x++) {
        $imageIterator->setIteratorRow($x * 5);
        $pixels = $imageIterator->getCurrentIteratorRow();
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $pixel) {
            /** @var $pixel \\ImagickPixel */
            /* Paint every second pixel black*/
            $pixel->setColor("rgba(0, 0, 0, 0)");
        }

        /* Sync the iterator, this is important to do on each iteration */
        $imageIterator->syncIterator();
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}
";s:11:"description";s:0:"";s:9:"startLine";i:206;s:7:"endLine";i:229;}',
    ),
    'synciteratorimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:20:"ImagickPixelIterator";s:12:"functionName";s:17:"syncIteratorImage";s:5:"lines";s:2227:"class Pixel
{
    public $r;
    public $g;
    public $b;

    public function __construct($r, $g, $b)
    {
        $this->r = $r;
        $this->g = $g;
        $this->b = $b;
    }
}

class PixelStack
{
    /**
     * @var Pixel[]
     */
    private $pixels = array();

    public function getAverageRed()
    {
        $total = 0;
        $count = 0;

        foreach ($this->pixels as $pixel) {
            $total += $pixel->r;
            $count++;
        }

        return $total / $count;
    }

    public function getAverageGreen()
    {
        $total = 0;
        $count = 0;

        foreach ($this->pixels as $pixel) {
            $total += $pixel->g;
            $count++;
        }

        return $total / $count;
    }

    public function getAverageBlue()
    {
        $total = 0;
        $count = 0;

        foreach ($this->pixels as $pixel) {
            $total += $pixel->b;
            $count++;
        }

        return $total / $count;
    }

    public function pushPixel($r, $g, $b)
    {
        $pixel = new Pixel($r, $g, $b);
        array_push($this->pixels, $pixel);

        if (count($this->pixels) > 20) {
            array_shift($this->pixels);
        }
    }
}


function syncIteratorImage($imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));

    $imageIterator = $imagick->getPixelRegionIterator(125, 100, 275, 200);

    /* Loop through pixel rows */
    foreach ($imageIterator as $pixels) {
        $pixelStatck = new PixelStack();
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $pixel) {
            /** @var $pixel \\ImagickPixel */
            $pixelStatck->pushPixel($pixel->getColorValue(\\Imagick::COLOR_RED), $pixel->getColorValue(\\Imagick::COLOR_GREEN), $pixel->getColorValue(\\Imagick::COLOR_BLUE));

            $color = sprintf("rgb(%d, %d, %d)", intval($pixelStatck->getAverageRed() * 255), intval($pixelStatck->getAverageGreen() * 255), intval($pixelStatck->getAverageBlue() * 255));

            $pixel->setColor($color);
        }

        /* Sync the iterator, this is important to do on each iteration */
        $imageIterator->syncIterator();
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}
";s:11:"description";s:0:"";s:9:"startLine";i:232;s:7:"endLine";i:331;}',
    ),
  ),
  'tutorial' => 
  array (
    'composite' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:9:"composite";s:5:"lines";s:322:"//    $imagick = new Imagick(realpath($imagePath1));
//    $imagick2 = new Imagick(realpath($imagePath2));
//    $imagick1->compositeImage($imagick2, $type, 0, 0);
//    $imagick1->setImageFormat(\'png\');
//
//    $image->setImageFormat("png");
//    header("Content-Type: image/png");
//    echo $imagick->getImageBlob();
";s:11:"description";s:0:"";s:9:"startLine";i:10;s:7:"endLine";i:19;}',
    ),
    'deconstructgif' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:14:"deconstructGif";s:5:"lines";s:1694:"function makeSimpleGif($deconstruct)
{
    $aniGif = new \\Imagick();
    $aniGif->setFormat("gif");

    $circleRadius = 20;
    $imageFrames = 40;
    $imageSize = 200;

    $background = new \\Imagick();
    $background->newpseudoimage($imageSize, $imageSize, "plasma:tomato-steelblue");

    $blackWhite = new \\Imagick();
    $blackWhite->newpseudoimage($imageSize, $imageSize, "gradient:black-white");

    $backgroundPalette = clone $background;
    $backgroundPalette->quantizeImage(240, \\Imagick::COLORSPACE_RGB, 8, false, false);

    $blackWhitePalette = clone $blackWhite;
    $blackWhitePalette->quantizeImage(16, \\Imagick::COLORSPACE_RGB, 8, false, false);

    $backgroundPalette->addimage($blackWhitePalette);

    for ($count=0; $count<$imageFrames; $count++) {
        $drawing = new \\ImagickDraw();
        $drawing->setFillColor(\'white\');
        $drawing->setStrokeColor(\'rgba(64, 64, 64, 0.8)\');
        $strokeWidth = 4;
        $drawing->setStrokeWidth($strokeWidth);
        
        $distanceToMove = $imageSize + (($circleRadius + $strokeWidth) * 2);
        $offset = ($distanceToMove * $count / ($imageFrames -1)) - ($circleRadius + $strokeWidth);
        $drawing->translate($offset, ($imageSize / 2) + ($imageSize / 3 * cos(20 * $count / $imageFrames)));
        $drawing->circle(0, 0, $circleRadius, 0);

        $frame = clone $background;
        $frame->drawimage($drawing);
        $frame->clutimage($backgroundPalette);
        $frame->setImageDelay(10);
        $aniGif->addImage($frame);
    }

    if ($deconstruct == true) {
        $aniGif = $aniGif->deconstructImages();
    }

    header("Content-Type: image/gif");
    echo $aniGif->getImagesBlob();
}
";s:11:"description";s:38:"Make a simple gif with lots of frames.";s:9:"startLine";i:8;s:7:"endLine";i:58;}',
    ),
    'fonteffect' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:10:"fontEffect";s:5:"lines";s:2151:"function drawText(\\Imagick $imagick, $shadow = false)
{
    $draw = new \\ImagickDraw();
    
    if ($shadow == true) {
        $draw->setStrokeColor(\'black\');
        $draw->setStrokeWidth(8);
        $draw->setFillColor(\'black\');
    }
    else {
        $draw->setStrokeColor(\'none\');
        $draw->setStrokeWidth(1);
        $draw->setFillColor(\'lightblue\');
    }

    $draw->setFontSize(96);
    $text = "Imagick\\nExample";
    $draw->setFont("../fonts/CANDY.TTF");
    $draw->setGravity(\\Imagick::GRAVITY_SOUTHWEST);
    $imagick->annotateimage($draw, 40, 40, 0, $text);

    if ($shadow == true) {
        $imagick->blurImage(10, 5);
    }
    
    return $imagick;
}

function getSilhouette(\\Imagick $imagick)
{
    $character = new \\Imagick();
    $character->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "canvas:white"
    );
    $canvas = new \\Imagick();
    $canvas->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "canvas:black"
    );
    $character->compositeimage(
        $imagick,
        \\Imagick::COMPOSITE_COPYOPACITY,
        0, 0
    );
    $canvas->compositeimage(
        $character,
        \\Imagick::COMPOSITE_ATOP,
        0, 0
    );
    $canvas->setFormat(\'png\');

    return $canvas;
}

function renderFontEffect()
{
    $canvas = new \\Imagick();
    $canvas->newPseudoImage(
        500,
        300,
        "canvas:none"
    );

    $canvas->setImageFormat(\'png\');
    $shadow = clone $canvas;

    $text = clone $canvas;
    drawText($text);
    drawText($shadow, true);

    $edge = getSilhouette($text);
    $kernel = \\ImagickKernel::fromBuiltIn(\\Imagick::KERNEL_OCTAGON, "2");
    $edge->morphology(\\Imagick::MORPHOLOGY_EDGE_IN, 1, $kernel);
    $edge->compositeImage(
        $text,
        \\Imagick::COMPOSITE_ATOP,
        0, 0
    );

    $canvas->compositeImage(
        $shadow,
        \\Imagick::COMPOSITE_COPY,
        0, 0
    );

    $canvas->compositeImage(
        $text,
        \\Imagick::COMPOSITE_ATOP,
        0, 0
    );

    header("Content-Type: image/png");
    echo $canvas->getImageBlob();
}
";s:11:"description";s:27:"Make some nice looking text";s:9:"startLine";i:5;s:7:"endLine";i:103;}',
    ),
    'fxanalyzeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:14:"fxAnalyzeImage";s:5:"lines";s:1901:"// Analyzes a one pixel wide image to make it easy to see what the
// gradient is doing
function fxAnalyzeImage(\\Imagick $imagick)
{
    $graphWidth = $imagick->getImageWidth();
    $sampleHeight = 20;
    $graphHeight = 128;
    $border = 2;

    $imageIterator = new \\ImagickPixelIterator($imagick);

    $reds = [];

    foreach ($imageIterator as $pixels) { /* Loop through pixel rows */
        foreach ($pixels as $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \\ImagickPixel */
            $color = $pixel->getColor();
            $reds[] = $color[\'r\'];
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    $draw = new \\ImagickDraw();

    $strokeColor = new \\ImagickPixel(\'red\');
    $fillColor = new \\ImagickPixel(\'none\');
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeWidth(1);
    $draw->setFontSize(72);
    $draw->setStrokeAntiAlias(true);

    $x = 0;
    $points = [];
    
    foreach ($reds as $red) {
        $pos = $graphHeight - ($red * $graphHeight / 256);
        $points[] = [\'x\' => $x, \'y\' => $pos];
        $x += 1;
    }

    $draw->polyline($points);

    $plot = new \\Imagick();
    $plot->newImage($graphWidth, $graphHeight, \'white\');
    $plot->drawImage($draw);

    $outputImage = new \\Imagick();
    $outputImage->newImage($graphWidth, $graphHeight + $sampleHeight, \'white\');
    $outputImage->compositeimage($plot, \\Imagick::COMPOSITE_ATOP, 0, 0);

    $imagick->resizeimage($imagick->getImageWidth(), $sampleHeight, \\Imagick::FILTER_LANCZOS, 1);

    $outputImage->compositeimage($imagick, \\Imagick::COMPOSITE_ATOP, 0, $graphHeight);
    $outputImage->borderimage(\'black\', $border, $border);

    $outputImage->setImageFormat("png");
    header("Content-Type: image/png");
    echo $outputImage;
}
";s:11:"description";s:0:"";s:9:"startLine";i:41;s:7:"endLine";i:102;}',
      1 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:14:"fxAnalyzeImage";s:5:"lines";s:323:"    public function example1()
    {
        $graphWidth = 256;
        $imagick = new \\Imagick();
        $imagick->newPseudoImage($graphWidth, 1, \'gradient:black-white\');
        $arguments = array(9, -90);
        $imagick->functionImage(\\Imagick::FUNCTION_SINUSOID, $arguments);
        fxAnalyzeImage($imagick);
    }
";s:11:"description";s:0:"";s:9:"startLine";i:61;s:7:"endLine";i:71;}',
      2 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:14:"fxAnalyzeImage";s:5:"lines";s:213:"    public function example2()
    {
        $graphWidth = 256;
        $imagick = new \\Imagick();
        $imagick->newPseudoImage($graphWidth, 1, \'gradient:black-white\');
        fxAnalyzeImage($imagick);
    }
";s:11:"description";s:0:"";s:9:"startLine";i:73;s:7:"endLine";i:81;}',
      3 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:14:"fxAnalyzeImage";s:5:"lines";s:246:"    public function example3()
    {
        $graphWidth = 256;
        $imagick = new \\Imagick();
        $imagick->newPseudoImage($graphWidth, 1, \'gradient:black-white\');
        $imagick->gammaimage(2);
        fxAnalyzeImage($imagick);
    }
";s:11:"description";s:0:"";s:9:"startLine";i:83;s:7:"endLine";i:92;}',
      4 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:14:"fxAnalyzeImage";s:5:"lines";s:432:"    public function example4()
    {
        $graphWidth = 256;
        $imagick = new \\Imagick();
        $imagick->newPseudoImage($graphWidth, 1, \'gradient:black-white\');
        $arguments = array(9, -90);
        $imagick->functionImage(\\Imagick::FUNCTION_SINUSOID, $arguments);
        $fx = "(1.0/(1.0+exp(10.0*(0.5-u)))-0.006693)*1.0092503";
        $fxImage = $imagick->fxImage($fx);
        fxAnalyzeImage($fxImage);
    }
";s:11:"description";s:0:"";s:9:"startLine";i:94;s:7:"endLine";i:106;}',
    ),
    'imagickcomposite' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:16:"imagickComposite";s:5:"lines";s:1318:"function imagickComposite()
{
    //Load the images
    $left = new \\Imagick(realpath(\'images/im/holocaust_tn.gif\'));
    $right = new \\Imagick(realpath(\'images/im/spiral_stairs_tn.gif\'));
    $gradient = new \\Imagick(realpath(\'images/im/overlap_mask.png\'));

    //The right bit will be offset by a certain amount - avoid recalculating.
    $offsetX = $gradient->getImageWidth() - $right->getImageWidth();


    //Fade out the left part - need to negate the mask to
    //make math correct
    $gradient2 = clone $gradient;
    $gradient2->negateimage(false);
    $left->compositeimage($gradient2, \\Imagick::COMPOSITE_COPYOPACITY, 0, 0);

    //Fade out the right part
    $right->compositeimage($gradient, \\Imagick::COMPOSITE_COPYOPACITY, -$offsetX, 0);

    //Create a new canvas to render everything in to.
    $canvas = new \\Imagick();
    $canvas->newImage($gradient->getImageWidth(), $gradient->getImageHeight(), new \\ImagickPixel(\'black\'));

    //Blend left half into final image
    $canvas->compositeimage($left, \\Imagick::COMPOSITE_BLEND, 0, 0);

    //Blend Right half into final image
    $canvas->compositeimage($right, \\Imagick::COMPOSITE_BLEND, $offsetX, 0);

    //Output the final image
    $canvas->setImageFormat(\'png\');

    header("Content-Type: image/png");
    echo $canvas->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:105;s:7:"endLine";i:142;}',
    ),
    'backgroundmasking' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:17:"backgroundMasking";s:5:"lines";s:3542:"function backgroundMasking()
{
    //Load the image
    $imagick = new \\Imagick(realpath(\'images/chair.jpeg\'));

    $backgroundColor = "rgb(255, 255, 255)";
    $fuzzFactor = 0.1;

    // Create a copy of the image, and paint all the pixels that
    // are the background color to be transparent
    $outlineImagick = clone $imagick;
    $outlineImagick->transparentPaintImage(
        $backgroundColor, 0, $fuzzFactor * \\Imagick::getQuantum(), false
    );
    
    // Copy the input image
    $mask = clone $imagick;
    // Deactivate the alpha channel if the image has one, as later in the process
    // we want the mask alpha to be copied from the colour channel to the src
    // alpha channel. If the mask image has an alpha channel, it would be copied
    // from that instead of from the colour channel.
    $mask->setImageAlphaChannel(\\Imagick::ALPHACHANNEL_DEACTIVATE);
    //Convert to gray scale to make life simpler
    $mask->transformImageColorSpace(\\Imagick::COLORSPACE_GRAY);

    // DstOut does a "cookie-cutter" it leaves the shape remaining after the
    // outlineImagick image, is cut out of the mask.
    $mask->compositeImage(
        $outlineImagick,
        \\Imagick::COMPOSITE_DSTOUT,
        0, 0
    );
    
    // The mask is now black where the objects are in the image and white
    // where the background is.
    // Negate the image, to have white where the objects are and black for
    // the background
    $mask->negateImage(false);

    $fillPixelHoles = false;
    
    if ($fillPixelHoles == true) {
        // If your image has pixel sized holes in it, you will want to fill them
        // in. This will however also make any acute corners in the image not be
        // transparent.
        
        // Fill holes - any black pixel that is surrounded by white will become
        // white
        $mask->blurimage(2, 1);
        $mask->whiteThresholdImage("rgb(10, 10, 10)");

        // Thinning - because the previous step made the outline thicker, we
        // attempt to make it thinner by an equivalent amount.
        $mask->blurimage(2, 1);
        $mask->blackThresholdImage("rgb(255, 255, 255)");
    }

    //Soften the edge of the mask to prevent jaggies on the outline.
    $mask->blurimage(2, 2);

    // We want the mask to go from full opaque to fully transparent quite quickly to
    // avoid having too many semi-transparent pixels. sigmoidalContrastImage does this
    // for us. Values to use where determined empirically.
    $contrast = 15;
    $midpoint = 0.7 * \\Imagick::getQuantum();
    $mask->sigmoidalContrastImage(true, $contrast, $midpoint);

    // Copy the mask into the opacity channel of the original image.
    // You are probably done here if you just want the background removed.
    $imagick->compositeimage(
        $mask,
        \\Imagick::COMPOSITE_COPYOPACITY,
        0, 0
    );

    // To show that the background has been removed (which is difficult to see
    // against a plain white webpage) we paste the image over a checkboard
    // so that the edges can be seen.
    
    // Create the check canvas
    $canvas = new \\Imagick();
    $canvas->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "pattern:checkerboard"
    );

    // Copy the image with the background removed over it.
    $canvas->compositeimage($imagick, \\Imagick::COMPOSITE_OVER, 0, 0);
    
    //Output the final image
    $canvas->setImageFormat(\'png\');
    header("Content-Type: image/png");
    echo $canvas->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:144;s:7:"endLine";i:240;}',
    ),
    'imagickcompositegen' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:19:"imagickCompositeGen";s:5:"lines";s:4194:"function generateBlendImage($height, $overlap, $contrast = 10, $midpoint = 0.5)
{
    $imagick = new \\Imagick();
    $imagick->newPseudoImage($height, $overlap, \'gradient:black-white\');
    $quantum = $imagick->getQuantum();
    $imagick->sigmoidalContrastImage(true, $contrast, $midpoint * $quantum);

    return $imagick;
}


function mergeImages(
    array $srcImages,
    $outputSize,
    $overlap,
    $contrast = 10,
    $blendMidpoint = 0.5,
    $horizontal = true
) {

    $images = array();
    $newImageWidth = 0;
    $newImageHeight = 0;

    if ($horizontal == true) {
        $resizeWidth = 0;
        $resizeHeight = $outputSize;
    }
    else {
        $resizeWidth = $outputSize;
        $resizeHeight = 0;
    }

    $blendWidth = 0;

    foreach ($srcImages as $srcImage) {
        $nextImage = new \\Imagick(realpath($srcImage));
        $nextImage->resizeImage($resizeWidth, $resizeHeight, \\Imagick::FILTER_LANCZOS, 0.5);

        if ($horizontal == true) {
            $newImageWidth += $nextImage->getImageWidth();
            $blendWidth = $nextImage->getImageHeight();
        }
        else {
            //$newImageWidth = $nextImage->getImageWidth();
            $blendWidth = $nextImage->getImageWidth();
            $newImageHeight += $nextImage->getImageHeight();
        }

        $images[] = $nextImage;
    }

    if ($horizontal == true) {
        $newImageWidth -= $overlap * (count($srcImages) - 1);
        $newImageHeight = $outputSize;
    }
    else {
        $newImageWidth = $outputSize;
        $newImageHeight -= $overlap * (count($srcImages) - 1);
    }

    if ($blendWidth == 0) {
        throw new \\Exception("Failed to read source images");
    }

    $fadeLeftSide = generateBlendImage($blendWidth, $overlap, $contrast, $blendMidpoint);

    if ($horizontal == true) {
        //We are placing the images horizontally.
        $fadeLeftSide->rotateImage(\'black\', -90);
    }

    //Fade out the left part - need to negate the mask to
    //make math correct
    $fadeRightSide = clone $fadeLeftSide;
    $fadeRightSide->negateimage(false);

    //Create a new canvas to render everything in to.
    $canvas = new \\Imagick();
    $canvas->newImage($newImageWidth, $newImageHeight, new \\ImagickPixel(\'black\'));

    $count = 0;

    $imagePositionX = 0;
    $imagePositionY = 0;

    /** @var $image \\Imagick */
    foreach ($images as $image) {
        $finalBlending = new \\Imagick();
        $finalBlending->newImage($image->getImageWidth(), $image->getImageHeight(), \'white\');

        if ($count != 0) {
            $finalBlending->compositeImage($fadeLeftSide, \\Imagick::COMPOSITE_ATOP, 0, 0);
        }

        $offsetX = 0;
        $offsetY = 0;

        if ($horizontal == true) {
            $offsetX = $image->getImageWidth() - $overlap;
        }
        else {
            $offsetY = $image->getImageHeight() - $overlap;
        }

        if ($count != count($images) - 1) {
            $finalBlending->compositeImage($fadeRightSide, \\Imagick::COMPOSITE_ATOP, $offsetX, $offsetY);
        }

        $image->compositeImage($finalBlending, \\Imagick::COMPOSITE_COPYOPACITY, 0, 0);
        $canvas->compositeimage($image, \\Imagick::COMPOSITE_BLEND, $imagePositionX, $imagePositionY);

        if ($horizontal == true) {
            $imagePositionX = $imagePositionX + $image->getImageWidth() - $overlap;
        }
        else {
            $imagePositionY = $imagePositionY + $image->getImageHeight() - $overlap;
        }
        $count++;
    }

    return $canvas;
}

function imagickCompositeGen($contrast = 10, $blendMidpoint = 0.5)
{
    $size = 160;

    //Load the images
    $output = mergeImages(
        [
            \'images/lories/6E6F9109_480.jpg\',
            \'images/lories/IMG_1599_480.jpg\',
            \'images/lories/IMG_2561_480.jpg\',
            \'images/lories/IMG_2837_480.jpg\',
            //\'images/lories/IMG_4023.jpg\',
        ],
        $size,
        0.2 * $size, //overlap
        $contrast,
        $blendMidpoint,
        true
    );

    //$output = generateBlendImage(200, 200, 5, 0.5);
    $output->setImageFormat(\'png\');

    header("Content-Type: image/png");
    echo $output->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:243;s:7:"endLine";i:394;}',
    ),
    'edgeextend' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:10:"edgeExtend";s:5:"lines";s:1243:"function edgeExtend($virtualPixelType, $imagePath)
{
    $imagick = new \\Imagick(realpath($imagePath));
    $imagick->setImageVirtualPixelMethod($virtualPixelType);

    $imagick->scaleimage(400, 300, true);

    $imagick->setbackgroundcolor(\'pink\');
   
    $desiredWidth = 600;
    $originalWidth = $imagick->getImageWidth();

    //Make the image be the desired width.
    $imagick->sampleimage($desiredWidth, $imagick->getImageHeight());

    //Now scale, rotate, translate (aka affine project) it
    //to be how you want
    $points = array(//The x scaling factor is 0.5 when the desired width is double
        //the source width
        ($originalWidth / $desiredWidth), 0, //Don\'t scale vertically
        0, 1, //Offset the image so that it\'s in the centre
        ($desiredWidth - $originalWidth) / 2, 0);

    $imagick->distortImage(\\Imagick::DISTORTION_AFFINEPROJECTION, $points, false);

    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

//Fyi it may be easier to think of the affine transform by 
//how it works for a rotation:
//$affineRotate = array(
//    "sx" => cos($angle),
//    "sy" => cos($angle),
//    "rx" => sin($angle),
//    "ry" => -sin($angle),
//    "tx" => 0,
//    "ty" => 0,
//);
}
";s:11:"description";s:0:"";s:9:"startLine";i:397;s:7:"endLine";i:437;}',
    ),
    'gradientreflection' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:18:"gradientReflection";s:5:"lines";s:1079:"function gradientReflection()
{
    $im = new \\Imagick(realpath(\'images/sample.png\'));
    
    $reflection = clone $im;

    $reflection->flipImage();

    $reflection->cropImage($im->getImageWidth(), $im->getImageHeight() * 0.75, 0, 0);

    $gradient = new \\Imagick();
    $gradient->newPseudoImage(
        $reflection->getImageWidth(),
        $reflection->getImageHeight(),
        //Putting spaces in the rgba string is bad
        \'gradient:rgba(255,0,255,0.6)-rgba(255,255,0,0.99)\'
    );

    $reflection->compositeimage(
        $gradient,
        \\Imagick::COMPOSITE_DSTOUT,
        0, 0
    );

    $canvas = new \\Imagick();
    $canvas->newImage($im->getImageWidth(), $im->getImageHeight() * 1.75, new \\ImagickPixel(\'rgba(255, 255, 255, 0)\'));
    $canvas->compositeImage($im, \\Imagick::COMPOSITE_BLEND, 0, 0);
    $canvas->setImageFormat(\'png\');
    $canvas->compositeImage($reflection, \\Imagick::COMPOSITE_BLEND, 0, $im->getImageHeight());

    $canvas->stripImage();
    $canvas->setImageFormat(\'png\');
    header(\'Content-Type: image/png\');
    echo $canvas;
}
";s:11:"description";s:0:"";s:9:"startLine";i:440;s:7:"endLine";i:476;}',
    ),
    'psychedelicfont' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:15:"psychedelicFont";s:5:"lines";s:903:"function psychedelicFont()
{
    $draw = new \\ImagickDraw();
    $name = \'Danack\';

    $draw->setStrokeOpacity(1);
    $draw->setFillColor(\'black\');
    $draw->setFont("../fonts/CANDY.TTF");

    $draw->setfontsize(150);

    for ($strokeWidth = 25; $strokeWidth > 0; $strokeWidth--) {
        $hue = intval(170 + $strokeWidth * 360 / 25);
        $draw->setStrokeColor("hsl($hue, 255, 128)");
        $draw->setStrokeWidth($strokeWidth * 3);
        $draw->annotation(60, 165, $name);
    }

    //Create an image object which the draw commands can be rendered into
    $imagick = new \\Imagick();
    $imagick->newImage(650, 230, "#eee");
    $imagick->setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $imagick->drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:479;s:7:"endLine";i:511;}',
    ),
    'psychedelicfontgif' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:18:"psychedelicFontGif";s:5:"lines";s:1614:"function psychedelicFontGif($name = \'Danack\')
{
    set_time_limit(3000);

    $aniGif = new \\Imagick();
    $aniGif->setFormat("gif");

    $maxFrames = 11;
    $scale = 0.25;

    for ($frame = 0; $frame < $maxFrames; $frame++) {
        $draw = new \\ImagickDraw();
        $draw->setStrokeOpacity(1);
        $draw->setFont("../fonts/CANDY.TTF");
        $draw->setfontsize(150 * $scale);

        for ($strokeWidth = 25; $strokeWidth > 0; $strokeWidth--) {
            $hue = intval(fmod(($frame * 360 / $maxFrames) + 170 + $strokeWidth * 360 / 25, 360));
            $color = "hsl($hue, 255, 128)";
            $draw->setStrokeColor($color);
            $draw->setFillColor($color);
            $draw->setStrokeWidth($strokeWidth * 3 * $scale);
            $draw->annotation(60 * $scale, 165 * $scale, $name);
        }

        $draw->setStrokeColor(\'none\');
        $draw->setFillColor(\'black\');
        $draw->setStrokeWidth(0);
        $draw->annotation(60 * $scale, 165 * $scale, $name);

        //Create an image object which the draw commands can be rendered into
        $imagick = new \\Imagick();
        $imagick->newImage(650 * $scale, 230 * $scale, "#eee");
        $imagick->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object
        //into the image.
        $imagick->drawImage($draw);

        $imagick->setImageDelay(5);
        $aniGif->addImage($imagick);

        $imagick->destroy();
    }

    $aniGif->setImageIterations(0); //loop forever
    $aniGif->deconstructImages();

    header("Content-Type: image/gif");
    echo $aniGif->getImagesBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:514;s:7:"endLine";i:566;}',
    ),
    'whirlygif' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:9:"whirlyGif";s:5:"lines";s:5141:"
function lerp($t, $a, $b)
{
    return $a + ($t * ($b - $a));
}

class Dot
{
    public function __construct($color, $sequence, $numberDots, $imageWidth, $imageHeight)
    {
        $this->color = $color;
        $this->sequence = $sequence;
        $this->numberDots = $numberDots;
        $this->imageWidth = $imageWidth;
        $this->imageHeight = $imageHeight;

        if ($this->numberDots < 0) {
            $this->numberDots = 0;
        }
    }

    public function calculateFraction($frame, $maxFrames, $timeOffset, $phaseMultiplier, $phaseDivider)
    {
        $frame = -$frame;
        $totalAngle = 2 * $phaseMultiplier;
        $fraction = ($frame / $maxFrames * 2);
        $fraction += $totalAngle * ($this->sequence / $this->numberDots);
        if ($phaseDivider != 0) {
            $fraction += (($this->sequence)) / ($phaseDivider);
        }
        $fraction += $timeOffset;

        while ($fraction < 0) {
            //fmod does not work \'correctly\' on negative numbers
            $fraction += 64;
        }

        $fraction = fmod($fraction, 2);
        
        if ($fraction > 1) {
            $unitFraction =  2 - $fraction;
        }
        else {
            $unitFraction = $fraction;
        }

        return $unitFraction * $unitFraction * (3 - 2 * $unitFraction);
    }


    public function render(\\ImagickDraw $draw, $frame, $maxFrames, $phaseMultiplier, $phaseDivider)
    {
        $innerDistance = 40;
        $outerDistance = 230;

        $sequenceFraction = $this->sequence / $this->numberDots;
        $angle = 2 * M_PI * $sequenceFraction;
        
        $trailSteps = 5;
        $trailLength = 0.1;
        
        $offsets = [
            100 => 0,
        ];
        
        for ($i=0; $i<=$trailSteps; $i++) {
            $key = intval(50 * $i / $trailSteps);
            $offsets[$key] = $trailLength * ($trailSteps - $i) / $trailSteps;
        }

        //TODO - using a pattern would make the circles look more natural
        //$draw->setFillPatternURL();

        foreach ($offsets as $alpha => $offset) {
            $distanceFraction = $this->calculateFraction($frame, $maxFrames, $offset, $phaseMultiplier, $phaseDivider);
            $distance = lerp($distanceFraction, $innerDistance, $outerDistance);
            $xOffset = $distance * sin($angle);
            $yOffset = $distance * cos($angle);
            $draw->setFillColor($this->color);
            $draw->setFillAlpha($alpha / 100);

            $xOffset = $xOffset * $this->imageWidth / 500;
            $yOffset = $yOffset * $this->imageHeight / 500;

            $xSize = 4 * $this->imageWidth / 500;
            $ySize = 4 * $this->imageHeight / 500;
            
            $draw->circle(
                $xOffset,
                $yOffset,
                $xOffset + $xSize,
                $yOffset + $ySize
            );
        }
    }
}


function whirlyGif($numberDots, $numberFrames, $loopTime, $backgroundColor, $phaseMultiplier, $phaseDivider)
{
    $aniGif = new \\Imagick();
    $aniGif->setFormat("gif");

    $width = 500;
    $height = $width;
    
    $numberDots = intval($numberDots);
    if ($numberDots < 1) {
        $numberDots = 1;
    }

    $maxFrames = $numberFrames;
    $frameDelay = ceil($loopTime / $maxFrames);

    $scale = 1;
    $startColor = new \\ImagickPixel(\'red\');
    $dots = [];

    for ($i=0; $i<$numberDots; $i++) {
        $colorInfo = $startColor->getHSL();

        //Rotate the hue by 180 degrees
        $newHue = $colorInfo[\'hue\'] + ($i / $numberDots);
        if ($newHue > 1) {
            $newHue = $newHue - 1;
        }

        //Set the ImagickPixel to the new color
        $color = new \\ImagickPixel(\'#ffffff\');
        $colorInfo[\'saturation\'] *= 0.95;
        $color->setHSL($newHue, $colorInfo[\'saturation\'], $colorInfo[\'luminosity\']);

        $dots[] = new Dot($color, $i, $numberDots, $width, $height);
    }

    for ($frame = 0; $frame < $maxFrames; $frame++) {
        $draw = new \\ImagickDraw();
        $draw->setStrokeColor(\'none\');
        $draw->setFillColor(\'none\');
        $draw->rectangle(0, 0, $width, $height);
        
        $draw->translate($width / 2, $height / 2);

        foreach ($dots as $dot) {
            /** @var $dot Dot */
            $dot->render($draw, $frame, $maxFrames, $phaseMultiplier, $phaseDivider);
        }

        //Create an image object which the draw commands can be rendered into
        $imagick = new \\Imagick();
        $imagick->newImage($width * $scale, $height * $scale, $backgroundColor);
        $imagick->setImageFormat("png");

        $imagick->setImageDispose(\\Imagick::DISPOSE_PREVIOUS);

        //Render the draw commands in the ImagickDraw object
        //into the image.
        $imagick->drawImage($draw);
                
        $imagick->setImageDelay($frameDelay);
        $aniGif->addImage($imagick);
        $imagick->destroy();
    }

    $aniGif->setImageFormat(\'gif\');
    $aniGif->setImageIterations(0); //loop forever
    $aniGif->mergeImageLayers(\\Imagick::LAYERMETHOD_OPTIMIZEPLUS);

    header("Content-Type: image/gif");
    echo $aniGif->getImagesBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:569;s:7:"endLine";i:741;}',
    ),
    'svgexample' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:10:"svgExample";s:5:"lines";s:654:"function svgExample()
{
    $svg = \'<?xml version="1.0"?>
    <svg width="120" height="120"
         viewPort="0 0 120 120" version="1.1"
         xmlns="http://www.w3.org/2000/svg">

        <defs>
            <clipPath id="myClip">
                <circle cx="30" cy="30" r="20"/>
                <circle cx="70" cy="70" r="20"/>
            </clipPath>
        </defs>

        <rect x="10" y="10" width="100" height="100"
              clip-path="url(#myClip)"/>

    </svg>\';

    $image = new \\Imagick();

    $image->readImageBlob($svg);
    $image->setImageFormat("jpg");
    header("Content-Type: image/jpg");
    echo $image->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:743;s:7:"endLine";i:770;}',
    ),
    'screenembed' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:11:"screenEmbed";s:5:"lines";s:814:"function screenEmbed()
{
    $overlay = new \\Imagick(realpath("images/dickbutt.jpg"));
    $imagick = new \\Imagick(realpath("images/Screeny.png"));

    $overlay->setImageVirtualPixelMethod(\\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);

    $width = $overlay->getImageWidth();
    $height = $overlay->getImageHeight();

    $offset = 332.9;

    $points = array(
        0, 0, 364 - $offset, 51,
        $width, 0, 473.4 - $offset, 23,
        0, $height, 433.5 - $offset, 182,
        $width, $height, 523 - $offset, 119.4
    );

    $overlay->modulateImage(97, 100, 0);
    $overlay->distortImage(\\Imagick::DISTORTION_PERSPECTIVE, $points, true);

    $imagick->compositeImage($overlay, \\Imagick::COMPOSITE_OVER, 364.5 - $offset, 23.5);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:773;s:7:"endLine";i:801;}',
    ),
    'levelizeimage' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:13:"levelizeImage";s:5:"lines";s:695:"function levelizeImage($blackPoint, $gamma, $whitePoint)
{
    $imagick = new \\Imagick();
    $imagick->newPseudoimage(300, 300, \'gradient:black-white\');
    $maxQuantum = $imagick->getQuantum();
    $imagick->evaluateimage(\\Imagick::EVALUATE_POW, 1 / $gamma);
    
    //Adjust the scale from black to white to the new \'distance\' between black and white
    $imagick->evaluateimage(\\Imagick::EVALUATE_MULTIPLY, ($whitePoint - $blackPoint) / 100);

    //Add move the black point to it\'s new value
    $imagick->evaluateimage(\\Imagick::EVALUATE_ADD, ($blackPoint / 100) * $maxQuantum);
    $imagick->setFormat("png");

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:804;s:7:"endLine";i:822;}',
    ),
    'imagegeometryreset' => 
    array (
      0 => 'O:23:"ImagickDemo\\CodeExample":6:{s:8:"category";s:8:"Tutorial";s:12:"functionName";s:18:"imageGeometryReset";s:5:"lines";s:890:"function imageGeometryReset()
{
    $draw = new \\ImagickDraw();

    $draw->setFont("../fonts/Arial.ttf");
    $draw->setFontSize(48);
    $draw->setStrokeAntialias(true);
    $draw->setTextAntialias(true);
    $draw->setFillColor(\'#ff0000\');

    $textOnly = new \\Imagick();
    $textOnly->newImage(600, 300, "rgb(230, 230, 230)");
    $textOnly->setImageFormat(\'png\');
    $textOnly->annotateImage($draw, 30, 40, 0, \'Your Text Here\');
    $textOnly->trimImage(0);
    $textOnly->setImagePage($textOnly->getimageWidth(), $textOnly->getimageheight(), 0, 0);

    $distort = array(180);
    $textOnly->setImageVirtualPixelMethod(Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);

    $textOnly->setImageMatte(true);
    $textOnly->distortImage(Imagick::DISTORTION_ARC, $distort, false);

    $textOnly->setformat(\'png\');

    header("Content-Type: image/png");
    echo $textOnly->getimageblob();
}
";s:11:"description";s:0:"";s:9:"startLine";i:824;s:7:"endLine";i:853;}',
    ),
  ),
);
    protected $manualEntries = array (
  'imagickpixel' => 
  array (
    'clear' => 
    array (
      'functionName' => 'clear',
      'description' => 'Clears the ImagickPixel object, leaving it in a fresh state. This also
   unsets any color associated with the object.',
      'methodDescription' => 'Clears resources associated with this object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'clear.xml',
      'parameters' => 
      array (
      ),
    ),
    'construct' => 
    array (
      'functionName' => '__construct',
      'description' => 'Constructs an ImagickPixel object. If a color is specified, the object is
   constructed and then initialised with that color before being returned.',
      'methodDescription' => 'The ImagickPixel constructor',
      'returnType' => 'Returns an ImagickPixel object on success, throwing ImagickPixelException on
   failure.',
      'classname' => 'imagickpixel',
      'method' => 'construct.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'color',
          'description' => 'The optional color string to use as the initial value of this object.',
        ),
      ),
    ),
    'destroy' => 
    array (
      'functionName' => 'destroy',
      'description' => 'Deallocates any resources used by the ImagickPixel object, and unsets any
   associated color. The object should not be used after the destroy function
   has been called.',
      'methodDescription' => 'Deallocates resources associated with this object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'destroy.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcolor' => 
    array (
      'functionName' => 'getColor',
      'description' => 'Returns the color described by the ImagickPixel object, as an array. If the color has an
   opacity channel set, this is provided as a fourth value in the list.',
      'methodDescription' => 'Returns the color',
      'returnType' => 'An array of channel values, each normalized if True; is given as param. Throws
   ImagickPixelException on error.',
      'classname' => 'imagickpixel',
      'method' => 'getcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'normalized',
          'description' => 'Normalize the color values',
        ),
      ),
    ),
    'getcolorasstring' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickpixel',
      'method' => 'getcolorasstring.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcolorcount' => 
    array (
      'functionName' => 'getColorCount',
      'description' => 'Returns the color count associated with this color.',
      'methodDescription' => 'Returns the color count associated with this color',
      'returnType' => 'Returns the color count as an integer on success, throws
  ImagickPixelException on failure.',
      'classname' => 'imagickpixel',
      'method' => 'getcolorcount.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcolorvalue' => 
    array (
      'functionName' => 'getColorValue',
      'description' => 'Retrieves the value of the color channel specified, as a floating-point
   number between 0 and 1.',
      'methodDescription' => 'Gets the normalized value of the provided color channel',
      'returnType' => 'The value of the channel, as a normalized floating-point number, throwing
   ImagickPixelException on error.',
      'classname' => 'imagickpixel',
      'method' => 'getcolorvalue.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'color',
          'description' => 'The color to get the value of, specified as one of the Imagick color
       constants. This can be one of the RGB colors, CMYK colors, alpha and
       opacity e.g (Imagick::COLOR_BLUE, Imagick::COLOR_MAGENTA).',
        ),
      ),
    ),
    'gethsl' => 
    array (
      'functionName' => 'getHSL',
      'description' => 'Returns the normalized HSL color described by the ImagickPixel object,
   with each of the three values as floating point numbers between 0.0
   and 1.0.',
      'methodDescription' => 'Returns the normalized HSL color of the ImagickPixel object',
      'returnType' => 'Returns the HSL value in an array with the keys "hue",
   "saturation", and "luminosity". Throws ImagickPixelException on failure.',
      'classname' => 'imagickpixel',
      'method' => 'gethsl.xml',
      'parameters' => 
      array (
      ),
    ),
    'ispixelsimilar' => 
    array (
      'functionName' => 'isPixelSimilar',
      'description' => 'Checks the distance between the color described by this ImagickPixel
   object and that of the provided object, by plotting their RGB values
   on the color cube. If the distance between the two points is less than
   the fuzz value given, the colors are similar.
   This method replaces ImagickPixel::isSimilar()
   and correctly normalises the fuzz value to ImageMagick QuantumRange.',
      'methodDescription' => 'Check the distance between this color and another',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'ispixelsimilar.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'color',
          'description' => 'The ImagickPixel object to compare this object against.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The maximum distance within which to consider these colors as similar.
       The theoretical maximum for this value is the square root of three
       (1.732).',
        ),
      ),
    ),
    'issimilar' => 
    array (
      'functionName' => 'isSimilar',
      'description' => 'Checks the distance between the color described by this ImagickPixel
   object and that of the provided object, by plotting their RGB values
   on the color cube. If the distance between the two points is less than
   the fuzz value given, the colors are similar.
   Deprecated in favour of ImagickPixel::isPixelSimilar().',
      'methodDescription' => 'Check the distance between this color and another',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'issimilar.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'color',
          'description' => 'The ImagickPixel object to compare this object against.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The maximum distance within which to consider these colors as similar.
       The theoretical maximum for this value is the square root of three
       (1.732).',
        ),
      ),
    ),
    'setcolor' => 
    array (
      'functionName' => 'setColor',
      'description' => 'Sets the color described by the ImagickPixel object, with a string
   (e.g. "blue", "#0000ff", "rgb(0,0,255)", "cmyk(100,100,100,10)", etc.).',
      'methodDescription' => 'Sets the color',
      'returnType' => 'Returns True; if the specified color was set, False; otherwise.',
      'classname' => 'imagickpixel',
      'method' => 'setcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'color',
          'description' => 'The color definition to use in order to initialise the
       ImagickPixel object.',
        ),
      ),
    ),
    'setcolorvalue' => 
    array (
      'functionName' => 'setColorValue',
      'description' => 'Sets the value of the specified channel of this object to the provided
   value, which should be between 0 and 1. This function can be used to
   provide an opacity channel to an ImagickPixel object.',
      'methodDescription' => 'Sets the normalized value of one of the channels',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'setcolorvalue.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'color',
          'description' => 'One of the Imagick color constants e.g. \\Imagick::COLOR_GREEN or \\Imagick::COLOR_ALPHA.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'value',
          'description' => 'The value to set this channel to, ranging from 0 to 1.',
        ),
      ),
    ),
    'sethsl' => 
    array (
      'functionName' => 'setHSL',
      'description' => 'Sets the color described by the ImagickPixel object using normalized
   values for hue, saturation and luminosity.',
      'methodDescription' => 'Sets the normalized HSL color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'sethsl.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'hue',
          'description' => 'The normalized value for hue, described as a fractional arc
       (between 0 and 1) of the hue circle, where the zero value is
       red.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'saturation',
          'description' => 'The normalized value for saturation, with 1 as full saturation.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'luminosity',
          'description' => 'The normalized value for luminosity, on a scale from black at
       0 to white at 1, with the full HS value at 0.5 luminosity.',
        ),
      ),
    ),
  ),
  'imagickpixeliterator' => 
  array (
    'clear' => 
    array (
      'functionName' => 'ImagickPixelIterator::clear',
      'description' => 'Clear resources associated with a PixelIterator.',
      'methodDescription' => 'Clear resources associated with a PixelIterator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'clear.xml',
      'parameters' => 
      array (
      ),
    ),
    'construct' => 
    array (
      'functionName' => 'ImagickPixelIterator::__construct',
      'description' => 'The ImagickPixelIterator constructor',
      'methodDescription' => 'The ImagickPixelIterator constructor',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'construct.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'wand',
          'description' => '',
        ),
      ),
    ),
    'destroy' => 
    array (
      'functionName' => 'ImagickPixelIterator::destroy',
      'description' => 'Deallocates resources associated with a PixelIterator.',
      'methodDescription' => 'Deallocates resources associated with a PixelIterator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'destroy.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcurrentiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::getCurrentIteratorRow',
      'description' => 'Returns the current row as an array of ImagickPixel objects from the pixel iterator.',
      'methodDescription' => 'Returns the current row of ImagickPixel objects',
      'returnType' => 'Returns a row as an array of ImagickPixel objects that can themselves be iterated.',
      'classname' => 'imagickpixeliterator',
      'method' => 'getcurrentiteratorrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'getiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::getIteratorRow',
      'description' => 'Returns the current pixel iterator row.',
      'methodDescription' => 'Returns the current pixel iterator row',
      'returnType' => 'Returns the integer offset of the row, throwing
   ImagickPixelIteratorException on error.',
      'classname' => 'imagickpixeliterator',
      'method' => 'getiteratorrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'getnextiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::getNextIteratorRow',
      'description' => 'Returns the next row as an array of pixel wands from the pixel iterator.',
      'methodDescription' => 'Returns the next row of the pixel iterator',
      'returnType' => 'Returns the next row as an array of ImagickPixel objects, throwing
   ImagickPixelIteratorException on error.',
      'classname' => 'imagickpixeliterator',
      'method' => 'getnextiteratorrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'getpreviousiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::getPreviousIteratorRow',
      'description' => 'Returns the previous row as an array of pixel wands from the pixel iterator.',
      'methodDescription' => 'Returns the previous row',
      'returnType' => 'Returns the previous row as an array of ImagickPixelWand objects from the
   ImagickPixelIterator, throwing ImagickPixelIteratorException on error.',
      'classname' => 'imagickpixeliterator',
      'method' => 'getpreviousiteratorrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'newpixeliterator' => 
    array (
      'functionName' => 'ImagickPixelIterator::newPixelIterator',
      'description' => 'Returns a new pixel iterator.',
      'methodDescription' => 'Returns a new pixel iterator',
      'returnType' => 'true on success, false on error; Throwing ImagickPixelIteratorException.',
      'classname' => 'imagickpixeliterator',
      'method' => 'newpixeliterator.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'wand',
          'description' => '',
        ),
      ),
    ),
    'newpixelregioniterator' => 
    array (
      'functionName' => 'ImagickPixelIterator::newPixelRegionIterator',
      'description' => 'Returns a new pixel iterator.',
      'methodDescription' => 'Returns a new pixel iterator',
      'returnType' => 'Returns a new ImagickPixelIterator on success; on failure, throws
   ImagickPixelIteratorException.',
      'classname' => 'imagickpixeliterator',
      'method' => 'newpixelregioniterator.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'wand',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'resetiterator' => 
    array (
      'functionName' => 'ImagickPixelIterator::resetIterator',
      'description' => 'Resets the pixel iterator.  Use it in conjunction with
   ImagickPixelIterator::getNextIteratorRow() to iterate over all the pixels
   in a pixel container.',
      'methodDescription' => 'Resets the pixel iterator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'resetiterator.xml',
      'parameters' => 
      array (
      ),
    ),
    'setiteratorfirstrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::setIteratorFirstRow',
      'description' => 'Sets the pixel iterator to the first pixel row.',
      'methodDescription' => 'Sets the pixel iterator to the first pixel row',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'setiteratorfirstrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'setiteratorlastrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::setIteratorLastRow',
      'description' => 'Sets the pixel iterator to the last pixel row.',
      'methodDescription' => 'Sets the pixel iterator to the last pixel row',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'setiteratorlastrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'setiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::setIteratorRow',
      'description' => 'Set the pixel iterator row.',
      'methodDescription' => 'Set the pixel iterator row',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'setiteratorrow.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'row',
          'description' => '',
        ),
      ),
    ),
    'synciterator' => 
    array (
      'functionName' => 'ImagickPixelIterator::syncIterator',
      'description' => 'Syncs the pixel iterator.',
      'methodDescription' => 'Syncs the pixel iterator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'synciterator.xml',
      'parameters' => 
      array (
      ),
    ),
  ),
  'imagickdraw' => 
  array (
    'affine' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'affine.xml',
      'parameters' => 
      array (
      ),
    ),
    'annotation' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'annotation.xml',
      'parameters' => 
      array (
      ),
    ),
    'arc' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'arc.xml',
      'parameters' => 
      array (
      ),
    ),
    'bezier' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'bezier.xml',
      'parameters' => 
      array (
      ),
    ),
    'circle' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'circle.xml',
      'parameters' => 
      array (
      ),
    ),
    'clear' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'clear.xml',
      'parameters' => 
      array (
      ),
    ),
    'clone' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'clone.xml',
      'parameters' => 
      array (
      ),
    ),
    'color' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'color.xml',
      'parameters' => 
      array (
      ),
    ),
    'comment' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'comment.xml',
      'parameters' => 
      array (
      ),
    ),
    'composite' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'composite.xml',
      'parameters' => 
      array (
      ),
    ),
    'construct' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'construct.xml',
      'parameters' => 
      array (
      ),
    ),
    'destroy' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'destroy.xml',
      'parameters' => 
      array (
      ),
    ),
    'ellipse' => 
    array (
      'functionName' => 'ellipse',
      'description' => 'Draws an ellipse on the image.',
      'methodDescription' => 'Draws an ellipse on the image',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'ellipse.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'ox',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'oy',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'rx',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'ry',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'start',
          'description' => '',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'end',
          'description' => '',
        ),
      ),
    ),
    'getclippath' => 
    array (
      'functionName' => 'getClipPath',
      'description' => 'Obtains the current clipping path ID.',
      'methodDescription' => 'Obtains the current clipping path ID',
      'returnType' => 'Returns a string containing the clip path ID or false if no clip path exists.',
      'classname' => 'imagickdraw',
      'method' => 'getclippath.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcliprule' => 
    array (
      'functionName' => 'getClipRule',
      'description' => 'Returns the current polygon fill rule to be used by the clipping path.',
      'methodDescription' => 'Returns the current polygon fill rule',
      'returnType' => 'Returns one of the FILLRULE_ constants.',
      'classname' => 'imagickdraw',
      'method' => 'getcliprule.xml',
      'parameters' => 
      array (
      ),
    ),
    'getclipunits' => 
    array (
      'functionName' => 'getClipUnits',
      'description' => 'Returns the interpretation of clip path units.',
      'methodDescription' => 'Returns the interpretation of clip path units',
      'returnType' => 'Returns an int on success.',
      'classname' => 'imagickdraw',
      'method' => 'getclipunits.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfillcolor' => 
    array (
      'functionName' => 'getFillColor',
      'description' => 'Returns the fill color used for drawing filled objects.',
      'methodDescription' => 'Returns the fill color',
      'returnType' => 'Returns an ImagickPixel object.',
      'classname' => 'imagickdraw',
      'method' => 'getfillcolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfillopacity' => 
    array (
      'functionName' => 'getFillOpacity',
      'description' => 'Returns the opacity used when drawing using the fill color or fill
   texture.  Fully opaque is 1.0.',
      'methodDescription' => 'Returns the opacity used when drawing',
      'returnType' => 'The opacity.',
      'classname' => 'imagickdraw',
      'method' => 'getfillopacity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfillrule' => 
    array (
      'functionName' => 'getFillRule',
      'description' => 'Returns the fill rule used while drawing polygons.',
      'methodDescription' => 'Returns the fill rule',
      'returnType' => 'Returns a FILLRULE_ constant',
      'classname' => 'imagickdraw',
      'method' => 'getfillrule.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfont' => 
    array (
      'functionName' => 'getFont',
      'description' => 'Returns a string specifying the font used when annotating with text.',
      'methodDescription' => 'Returns the font',
      'returnType' => 'Returns a string on success and false if no font is set.',
      'classname' => 'imagickdraw',
      'method' => 'getfont.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfontfamily' => 
    array (
      'functionName' => 'getFontFamily',
      'description' => 'Returns the font family to use when annotating with text.',
      'methodDescription' => 'Returns the font family',
      'returnType' => 'Returns the font family currently selected or false if font family is not set.',
      'classname' => 'imagickdraw',
      'method' => 'getfontfamily.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfontsize' => 
    array (
      'functionName' => 'getFontSize',
      'description' => 'Returns the font pointsize used when annotating with text.',
      'methodDescription' => 'Returns the font pointsize',
      'returnType' => 'Returns the font size associated with the current ImagickDraw object.',
      'classname' => 'imagickdraw',
      'method' => 'getfontsize.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfontstyle' => 
    array (
      'functionName' => 'getFontStyle',
      'description' => 'Returns the font style used when annotating with text.',
      'methodDescription' => 'Returns the font style',
      'returnType' => 'Returns the font style constant (STYLE_) associated with the ImagickDraw object 
   or 0 if no style is set.',
      'classname' => 'imagickdraw',
      'method' => 'getfontstyle.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfontweight' => 
    array (
      'functionName' => 'getFontWeight',
      'description' => 'Returns the font weight used when annotating with text.',
      'methodDescription' => 'Returns the font weight',
      'returnType' => 'Returns an int on success and 0 if no weight is set.',
      'classname' => 'imagickdraw',
      'method' => 'getfontweight.xml',
      'parameters' => 
      array (
      ),
    ),
    'getgravity' => 
    array (
      'functionName' => 'getGravity',
      'description' => 'Returns the text placement gravity used when annotating with text.',
      'methodDescription' => 'Returns the text placement gravity',
      'returnType' => 'Returns a GRAVITY_ constant on success and 0 if no gravity is set.',
      'classname' => 'imagickdraw',
      'method' => 'getgravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokeantialias' => 
    array (
      'functionName' => 'getStrokeAntialias',
      'description' => 'Returns the current stroke antialias setting. Stroked outlines are
   antialiased by default.  When antialiasing is disabled stroked pixels are
   thresholded to determine if the stroke color or underlying canvas color
   should be used.',
      'methodDescription' => 'Returns the current stroke antialias setting',
      'returnType' => 'Returns True; if antialiasing is on and false if it is off.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokeantialias.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokecolor' => 
    array (
      'functionName' => 'getStrokeColor',
      'description' => 'Returns the color used for stroking object outlines.',
      'methodDescription' => 'Returns the color used for stroking object outlines',
      'returnType' => 'Returns an ImagickPixel object which describes the color.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokecolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokedasharray' => 
    array (
      'functionName' => 'getStrokeDashArray',
      'description' => 'Returns an array representing the pattern of dashes and gaps used to
   stroke paths.',
      'methodDescription' => 'Returns an array representing the pattern of dashes and gaps used to stroke paths',
      'returnType' => 'Returns an array on success and empty array if not set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokedasharray.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokedashoffset' => 
    array (
      'functionName' => 'getStrokeDashOffset',
      'description' => 'Returns the offset into the dash pattern to start the dash.',
      'methodDescription' => 'Returns the offset into the dash pattern to start the dash',
      'returnType' => 'Returns a float representing the offset and 0 if it\'s not set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokedashoffset.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokelinecap' => 
    array (
      'functionName' => 'getStrokeLineCap',
      'description' => 'Returns the shape to be used at the end of open subpaths when they are
   stroked.',
      'methodDescription' => 'Returns the shape to be used at the end of open subpaths when they are stroked',
      'returnType' => 'Returns one of the LINECAP_ constants or 0 if stroke linecap is not set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokelinecap.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokelinejoin' => 
    array (
      'functionName' => 'getStrokeLineJoin',
      'description' => 'Returns the shape to be used at the corners of paths (or other vector
   shapes) when they are stroked.',
      'methodDescription' => 'Returns the shape to be used at the corners of paths when they are stroked',
      'returnType' => 'Returns one of the LINEJOIN_ constants or 0 if stroke line join is not set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokelinejoin.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokemiterlimit' => 
    array (
      'functionName' => 'getStrokeMiterLimit',
      'description' => 'Returns the miter limit. When two line segments meet at a sharp angle and
   miter joins have been specified for \'lineJoin\', it is possible for the
   miter to extend far beyond the thickness of the line stroking the path.
   The \'miterLimit\' imposes a limit on the ratio of the miter length to the
   \'lineWidth\'.',
      'methodDescription' => 'Returns the stroke miter limit',
      'returnType' => 'Returns an int describing the miter limit
   and 0 if no miter limit is set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokemiterlimit.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokeopacity' => 
    array (
      'functionName' => 'getStrokeOpacity',
      'description' => 'Returns the opacity of stroked object outlines.',
      'methodDescription' => 'Returns the opacity of stroked object outlines',
      'returnType' => 'Returns a double describing the opacity.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokeopacity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokewidth' => 
    array (
      'functionName' => 'getStrokeWidth',
      'description' => 'Returns the width of the stroke used to draw object outlines.',
      'methodDescription' => 'Returns the width of the stroke used to draw object outlines',
      'returnType' => 'Returns a double describing the stroke width.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokewidth.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextalignment' => 
    array (
      'functionName' => 'getTextAlignment',
      'description' => 'Returns the alignment applied when annotating with text.',
      'methodDescription' => 'Returns the text alignment',
      'returnType' => 'Returns one of the ALIGN_ constants and 0 if no align is set.',
      'classname' => 'imagickdraw',
      'method' => 'gettextalignment.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextantialias' => 
    array (
      'functionName' => 'getTextAntialias',
      'description' => 'Returns the current text antialias setting, which determines whether text
   is antialiased.  Text is antialiased by default.',
      'methodDescription' => 'Returns the current text antialias setting',
      'returnType' => 'Returns True; if text is antialiased and false if not.',
      'classname' => 'imagickdraw',
      'method' => 'gettextantialias.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextdecoration' => 
    array (
      'functionName' => 'getTextDecoration',
      'description' => 'Returns the decoration applied when annotating with text.',
      'methodDescription' => 'Returns the text decoration',
      'returnType' => 'Returns one of the DECORATION_ constants
   and 0 if no decoration is set.',
      'classname' => 'imagickdraw',
      'method' => 'gettextdecoration.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextencoding' => 
    array (
      'functionName' => 'getTextEncoding',
      'description' => 'Returns a string which specifies the code set used for text annotations.',
      'methodDescription' => 'Returns the code set used for text annotations',
      'returnType' => 'Returns a string specifying the code set
   or false if text encoding is not set.',
      'classname' => 'imagickdraw',
      'method' => 'gettextencoding.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextundercolor' => 
    array (
      'functionName' => 'getTextUnderColor',
      'description' => 'Returns the color of a background rectangle to place under text annotations.',
      'methodDescription' => 'Returns the text under color',
      'returnType' => 'Returns an ImagickPixel object describing the color.',
      'classname' => 'imagickdraw',
      'method' => 'gettextundercolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getvectorgraphics' => 
    array (
      'functionName' => 'getVectorGraphics',
      'description' => 'Returns a string which specifies the vector graphics generated by any
   graphics calls made since the ImagickDraw object was instantiated.',
      'methodDescription' => 'Returns a string containing vector graphics',
      'returnType' => 'Returns a string containing the vector graphics.',
      'classname' => 'imagickdraw',
      'method' => 'getvectorgraphics.xml',
      'parameters' => 
      array (
      ),
    ),
    'line' => 
    array (
      'functionName' => 'line',
      'description' => 'Draws a line on the image using the current stroke color, stroke opacity, and stroke width.',
      'methodDescription' => 'Draws a line',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'line.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'sx',
          'description' => 'starting x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sy',
          'description' => 'starting y coordinate',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'ex',
          'description' => 'ending x coordinate',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'ey',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'matte' => 
    array (
      'functionName' => 'matte',
      'description' => 'Paints on the image\'s opacity channel in order to set effected pixels to
   transparent, to influence the opacity of pixels.',
      'methodDescription' => 'Paints on the image\'s opacity channel',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'matte.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the matte',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the matte',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'paintMethod',
          'description' => 'PAINT_ constant',
        ),
      ),
    ),
    'pathclose' => 
    array (
      'functionName' => 'pathClose',
      'description' => 'Adds a path element to the current path which closes the current subpath
   by drawing a straight line from the current point to the current subpath\'s
   most recent starting point (usually, the most recent moveto point).',
      'methodDescription' => 'Adds a path element to the current path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathclose.xml',
      'parameters' => 
      array (
      ),
    ),
    'pathcurvetoabsolute' => 
    array (
      'functionName' => 'pathCurveToAbsolute',
      'description' => 'Draws a cubic Bezier curve from the current point to (x,y) using (x1,y1)
   as the control point at the beginning of the curve and (x2,y2) as the
   control point at the end of the curve using absolute coordinates. At the
   end of the command, the new current point becomes the final (x,y)
   coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a cubic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of the first control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of the first control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the second control point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the first control point',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the curve end',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the curve end',
        ),
      ),
    ),
    'pathcurvetoquadraticbezierabsolute' => 
    array (
      'functionName' => 'pathCurveToQuadraticBezierAbsolute',
      'description' => 'Draws a quadratic Bezier curve from the current point to (x,y) using
   (x1,y1) as the control point using absolute coordinates. At the end of the
   command, the new current point becomes the final (x,y) coordinate pair
   used in the polybezier.',
      'methodDescription' => 'Draws a quadratic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoquadraticbezierabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of the control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of the  control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the end point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the end point',
        ),
      ),
    ),
    'pathcurvetoquadraticbezierrelative' => 
    array (
      'functionName' => 'pathCurveToQuadraticBezierRelative',
      'description' => 'Draws a quadratic Bezier curve from the current point to (x,y) using
   (x1,y1) as the control point using relative coordinates. At the end of the
   command, the new current point becomes the final (x,y) coordinate pair
   used in the polybezier.',
      'methodDescription' => 'Draws a quadratic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoquadraticbezierrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'starting x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'starting y coordinate',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'ending x coordinate',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'pathcurvetoquadraticbeziersmoothabsolute' => 
    array (
      'functionName' => 'pathCurveToQuadraticBezierSmoothAbsolute',
      'description' => 'Draws a quadratic Bezier curve (using absolute coordinates) from the
   current point to (x,y). The control point is assumed to be the reflection
   of the control point on the previous command relative to the current point.
   (If there is no previous command or if the previous command was not a
   DrawPathCurveToQuadraticBezierAbsolute,
   DrawPathCurveToQuadraticBezierRelative,
   DrawPathCurveToQuadraticBezierSmoothAbsolut or
   DrawPathCurveToQuadraticBezierSmoothRelative, assume the control point is
   coincident with the current point.). At the end of the command, the new
   current point becomes the final (x,y) coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a quadratic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoquadraticbeziersmoothabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'ending x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'pathcurvetoquadraticbeziersmoothrelative' => 
    array (
      'functionName' => 'pathCurveToQuadraticBezierSmoothRelative',
      'description' => 'Draws a quadratic Bezier curve (using relative coordinates) from the
   current point to (x, y). The control point is assumed to be the reflection
   of the control point on the previous command relative to the current point.
   (If there is no previous command or if the previous command was not a
   DrawPathCurveToQuadraticBezierAbsolute, 
   DrawPathCurveToQuadraticBezierRelative, 
   DrawPathCurveToQuadraticBezierSmoothAbsolut or 
   DrawPathCurveToQuadraticBezierSmoothRelative, assume the control point is
   coincident with the current point). At the end of the command, the new
   current point becomes the final (x, y) coordinate pair used in the
   polybezier.',
      'methodDescription' => 'Draws a quadratic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoquadraticbeziersmoothrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'ending x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'pathcurvetorelative' => 
    array (
      'functionName' => 'pathCurveToRelative',
      'description' => 'Draws a cubic Bezier curve from the current point to (x,y) using (x1,y1)
   as the control point at the beginning of the curve and (x2,y2) as the
   control point at the end of the curve using relative coordinates. At the
   end of the command, the new current point becomes the final (x,y) 
   coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a cubic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetorelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of starting control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of starting control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of ending control point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of ending control point',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'ending x coordinate',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'pathcurvetosmoothabsolute' => 
    array (
      'functionName' => 'pathCurveToSmoothAbsolute',
      'description' => 'Draws a cubic Bezier curve from the current point to (x,y) using absolute
   coordinates. The first control point is assumed to be the reflection of the
   second control point on the previous command relative to the current point.
   (If there is no previous command or if the previous command was not an 
   DrawPathCurveToAbsolute, DrawPathCurveToRelative, 
   DrawPathCurveToSmoothAbsolute or DrawPathCurveToSmoothRelative, assume the
   first control point is coincident with the current point.) (x2,y2) is the
   second control point (i.e., the control point at the end of the curve).
   At the end of the command, the new current point becomes the final (x,y)
   coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a cubic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetosmoothabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the second control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the second control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the ending point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the ending point',
        ),
      ),
    ),
    'pathcurvetosmoothrelative' => 
    array (
      'functionName' => 'pathCurveToSmoothRelative',
      'description' => 'Draws a cubic Bezier curve from the current point to (x,y) using relative
   coordinates. The first control point is assumed to be the reflection of
   the second control point on the previous command relative to the current
   point. (If there is no previous command or if the previous command was not
   an DrawPathCurveToAbsolute, DrawPathCurveToRelative, 
   DrawPathCurveToSmoothAbsolute or DrawPathCurveToSmoothRelative, assume the
   first control point is coincident with the current point.) (x2,y2) is the
   second control point (i.e., the control point at the end of the curve). At
   the end of the command, the new current point becomes the final (x,y)
   coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a cubic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetosmoothrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the second control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the second control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the ending point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the ending point',
        ),
      ),
    ),
    'pathellipticarcabsolute' => 
    array (
      'functionName' => 'pathEllipticArcAbsolute',
      'description' => 'Draws an elliptical arc from the current point to (x, y) using absolute
   coordinates. The size and orientation of the ellipse are defined by two
   radii (rx, ry) and an xAxisRotation, which indicates how the ellipse as
   a whole is rotated relative to the current coordinate system. The center
   (cx, cy) of the ellipse is calculated automatically to satisfy the
   constraints imposed by the other parameters. largeArcFlag and sweepFlag
   contribute to the automatic calculations and help determine how the arc
   is drawn. If largeArcFlag is True; then draw the larger of the available
   arcs. If sweepFlag is true, then draw the arc matching a clock-wise
   rotation.',
      'methodDescription' => 'Draws an elliptical arc',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathellipticarcabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'rx',
          'description' => 'x radius',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'ry',
          'description' => 'y radius',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x_axis_rotation',
          'description' => 'x axis rotation',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'large_arc_flag',
          'description' => 'large arc flag',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'sweep_flag',
          'description' => 'sweep flag',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate',
        ),
        6 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate',
        ),
      ),
    ),
    'pathellipticarcrelative' => 
    array (
      'functionName' => 'pathEllipticArcRelative',
      'description' => 'Draws an elliptical arc from the current point to (x, y) using relative
   coordinates. The size and orientation of the ellipse are defined by two
   radii (rx, ry) and an xAxisRotation, which indicates how the ellipse as
   a whole is rotated relative to the current coordinate system. The center
   (cx, cy) of the ellipse is calculated automatically to satisfy the
   constraints imposed by the other parameters. largeArcFlag and sweepFlag
   contribute to the automatic calculations and help determine how the arc
   is drawn. If largeArcFlag is True; then draw the larger of the available
   arcs. If sweepFlag is true, then draw the arc matching a clock-wise
   rotation.',
      'methodDescription' => 'Draws an elliptical arc',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathellipticarcrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'rx',
          'description' => 'x radius',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'ry',
          'description' => 'y radius',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x_axis_rotation',
          'description' => 'x axis rotation',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'large_arc_flag',
          'description' => 'large arc flag',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'sweep_flag',
          'description' => 'sweep flag',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate',
        ),
        6 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate',
        ),
      ),
    ),
    'pathfinish' => 
    array (
      'functionName' => 'pathFinish',
      'description' => 'Terminates the current path.',
      'methodDescription' => 'Terminates the current path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathfinish.xml',
      'parameters' => 
      array (
      ),
    ),
    'pathlinetoabsolute' => 
    array (
      'functionName' => 'pathLineToAbsolute',
      'description' => 'Draws a line path from the current point to the given coordinate using
   absolute coordinates. The coordinate then becomes the new current point.',
      'methodDescription' => 'Draws a line path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetoabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'starting x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending x coordinate',
        ),
      ),
    ),
    'pathlinetohorizontalabsolute' => 
    array (
      'functionName' => 'pathLineToHorizontalAbsolute',
      'description' => 'Draws a horizontal line path from the current point to the target point
   using absolute coordinates.  The target point then becomes the new
   current point.',
      'methodDescription' => 'Draws a horizontal line path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetohorizontalabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate',
        ),
      ),
    ),
    'pathlinetohorizontalrelative' => 
    array (
      'functionName' => 'pathLineToHorizontalRelative',
      'description' => 'Draws a horizontal line path from the current point to the target point
   using relative coordinates.  The target point then becomes the new
   current point.',
      'methodDescription' => 'Draws a horizontal line',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetohorizontalrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate',
        ),
      ),
    ),
    'pathlinetorelative' => 
    array (
      'functionName' => 'pathLineToRelative',
      'description' => 'Draws a line path from the current point to the given coordinate using
   relative coordinates. The coordinate then becomes the new current point.',
      'methodDescription' => 'Draws a line path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetorelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'starting x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'starting y coordinate',
        ),
      ),
    ),
    'pathlinetoverticalabsolute' => 
    array (
      'functionName' => 'pathLineToVerticalAbsolute',
      'description' => 'Draws a vertical line path from the current point to the target point using
   absolute coordinates.  The target point then becomes the new current point.',
      'methodDescription' => 'Draws a vertical line',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetoverticalabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate',
        ),
      ),
    ),
    'pathlinetoverticalrelative' => 
    array (
      'functionName' => 'pathLineToVerticalRelative',
      'description' => 'Draws a vertical line path from the current point to the target point using
   relative coordinates.  The target point then becomes the new current point.',
      'methodDescription' => 'Draws a vertical line path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetoverticalrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate',
        ),
      ),
    ),
    'pathmovetoabsolute' => 
    array (
      'functionName' => 'pathMoveToAbsolute',
      'description' => 'Starts a new sub-path at the given coordinate using absolute coordinates.
   The current point then becomes the specified coordinate.',
      'methodDescription' => 'Starts a new sub-path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathmovetoabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the starting point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the starting point',
        ),
      ),
    ),
    'pathmovetorelative' => 
    array (
      'functionName' => 'pathMoveToRelative',
      'description' => 'Starts a new sub-path at the given coordinate using relative coordinates.
   The current point then becomes the specified coordinate.',
      'methodDescription' => 'Starts a new sub-path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathmovetorelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'target x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'target y coordinate',
        ),
      ),
    ),
    'pathstart' => 
    array (
      'functionName' => 'pathStart',
      'description' => 'Declares the start of a path drawing list which is terminated by a matching
   DrawPathFinish() command. All other DrawPath commands must be enclosed
   between a and a DrawPathFinish() command. This is because path drawing
   commands are subordinate commands and they do not function by themselves.',
      'methodDescription' => 'Declares the start of a path drawing list',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathstart.xml',
      'parameters' => 
      array (
      ),
    ),
    'point' => 
    array (
      'functionName' => 'point',
      'description' => 'Draws a point using the current stroke color and stroke thickness at the specified coordinates.',
      'methodDescription' => 'Draws a point',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'point.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'point\'s x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'point\'s y coordinate',
        ),
      ),
    ),
    'polygon' => 
    array (
      'functionName' => 'polygon',
      'description' => 'Draws a polygon using the current stroke, stroke width, and fill color or
   texture, using the specified array of coordinates.',
      'methodDescription' => 'Draws a polygon',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'polygon.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'coordinates',
          'description' => 'multidimensional array like array( array( \'x\' => 3, \'y\' => 4 ), array( \'x\' => 2, \'y\' => 6 ) );',
        ),
      ),
    ),
    'polyline' => 
    array (
      'functionName' => 'polyline',
      'description' => 'Draws a polyline using the current stroke, stroke width, and fill color or
   texture, using the specified array of coordinates.',
      'methodDescription' => 'Draws a polyline',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'polyline.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'coordinates',
          'description' => 'array of x and y coordinates: array( array( \'x\' => 4, \'y\' => 6 ), array( \'x\' => 8, \'y\' => 10 ) )',
        ),
      ),
    ),
    'pop' => 
    array (
      'functionName' => 'pop',
      'description' => 'Destroys the current ImagickDraw in the stack, and returns to the
   previously pushed ImagickDraw. Multiple ImagickDraws may exist. It is an
   error to attempt to pop more ImagickDraws than have been pushed, and it is
   proper form to pop all ImagickDraws which have been pushed.',
      'methodDescription' => 'Destroys the current ImagickDraw in the stack, and returns to the previously pushed ImagickDraw',
      'returnType' => 'Returns True; on success and false on failure.',
      'classname' => 'imagickdraw',
      'method' => 'pop.xml',
      'parameters' => 
      array (
      ),
    ),
    'popclippath' => 
    array (
      'functionName' => 'popClipPath',
      'description' => 'Terminates a clip path definition.',
      'methodDescription' => 'Terminates a clip path definition',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'popclippath.xml',
      'parameters' => 
      array (
      ),
    ),
    'popdefs' => 
    array (
      'functionName' => 'popDefs',
      'description' => 'Terminates a definition list.',
      'methodDescription' => 'Terminates a definition list',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'popdefs.xml',
      'parameters' => 
      array (
      ),
    ),
    'poppattern' => 
    array (
      'functionName' => 'popPattern',
      'description' => 'Terminates a pattern definition.',
      'methodDescription' => 'Terminates a pattern definition',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'poppattern.xml',
      'parameters' => 
      array (
      ),
    ),
    'push' => 
    array (
      'functionName' => 'push',
      'description' => 'Clones the current ImagickDraw to create a new ImagickDraw, which is then
   added to the ImagickDraw stack. The original drawing ImagickDraw(s) may be
   returned to by invoking pop(). The ImagickDraws are stored on a
   ImagickDraw stack. For every Pop there must have already been an equivalent
   Push.',
      'methodDescription' => 'Clones the current ImagickDraw and pushes it to the stack',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'push.xml',
      'parameters' => 
      array (
      ),
    ),
    'pushclippath' => 
    array (
      'functionName' => 'pushClipPath',
      'description' => 'Starts a clip path definition which is comprised of any number of drawing
   commands and terminated by a ImagickDraw::popClipPath() command.',
      'methodDescription' => 'Starts a clip path definition',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pushclippath.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'clip_mask_id',
          'description' => 'Clip mask Id',
        ),
      ),
    ),
    'pushdefs' => 
    array (
      'functionName' => 'pushDefs',
      'description' => 'Indicates that commands up to a terminating ImagickDraw::popDefs()
   command create named elements (e.g. clip-paths, textures, etc.) which
   may safely be processed earlier for the sake of efficiency.',
      'methodDescription' => 'Indicates that following commands create named elements for early processing',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pushdefs.xml',
      'parameters' => 
      array (
      ),
    ),
    'pushpattern' => 
    array (
      'functionName' => 'pushPattern',
      'description' => 'Indicates that subsequent commands up to a DrawPopPattern() command
   comprise the definition of a named pattern. The pattern space is assigned
   top left corner coordinates, a width and height, and becomes its own
   drawing space.  Anything which can be drawn may be used in a pattern
   definition. Named patterns may be used as stroke or brush definitions.',
      'methodDescription' => 'Indicates that subsequent commands up to a ImagickDraw::opPattern() command comprise the definition of a named pattern',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'pushpattern.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern_id',
          'description' => 'the pattern Id',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the top-left corner',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the top-left corner',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'width',
          'description' => 'width of the pattern',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'height',
          'description' => 'height of the pattern',
        ),
      ),
    ),
    'rectangle' => 
    array (
      'functionName' => 'rectangle',
      'description' => 'Draws a rectangle given two coordinates and using the current stroke,
   stroke width, and fill settings.',
      'methodDescription' => 'Draws a rectangle',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'rectangle.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of the top left corner',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of the top left corner',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the bottom right corner',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the bottom right corner',
        ),
      ),
    ),
    'render' => 
    array (
      'functionName' => 'render',
      'description' => 'Renders all preceding drawing commands onto the image.',
      'methodDescription' => 'Renders all preceding drawing commands onto the image',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'render.xml',
      'parameters' => 
      array (
      ),
    ),
    'rotate' => 
    array (
      'functionName' => 'rotate',
      'description' => 'Applies the specified rotation to the current coordinate space.',
      'methodDescription' => 'Applies the specified rotation to the current coordinate space',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'rotate.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => 'degrees to rotate',
        ),
      ),
    ),
    'roundrectangle' => 
    array (
      'functionName' => 'roundRectangle',
      'description' => 'Draws a rounded rectangle given two coordinates, x & y corner radiuses
   and using the current stroke, stroke width, and fill settings.',
      'methodDescription' => 'Draws a rounded rectangle',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'roundrectangle.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of the top left corner',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of the top left corner',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the bottom right',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the bottom right',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'rx',
          'description' => 'x rounding',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'ry',
          'description' => 'y rounding',
        ),
      ),
    ),
    'scale' => 
    array (
      'functionName' => 'scale',
      'description' => 'Adjusts the scaling factor to apply in the horizontal and vertical
   directions to the current coordinate space.',
      'methodDescription' => 'Adjusts the scaling factor',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'scale.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'horizontal factor',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'vertical factor',
        ),
      ),
    ),
    'setclippath' => 
    array (
      'functionName' => 'setClipPath',
      'description' => 'Associates a named clipping path with the image.  Only the areas drawn on
   by the clipping path will be modified as long as it remains in effect.',
      'methodDescription' => 'Associates a named clipping path with the image',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setclippath.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'clip_mask',
          'description' => 'the clipping path name',
        ),
      ),
    ),
    'setcliprule' => 
    array (
      'functionName' => 'setClipRule',
      'description' => 'Set the polygon fill rule to be used by the clipping path.',
      'methodDescription' => 'Set the polygon fill rule to be used by the clipping path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setcliprule.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'fill_rule',
          'description' => 'FILLRULE_ constant',
        ),
      ),
    ),
    'setclipunits' => 
    array (
      'functionName' => 'setClipUnits',
      'description' => 'Sets the interpretation of clip path units.',
      'methodDescription' => 'Sets the interpretation of clip path units',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setclipunits.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'clip_units',
          'description' => 'the number of clip units',
        ),
      ),
    ),
    'setfillalpha' => 
    array (
      'functionName' => 'setFillAlpha',
      'description' => 'Sets the opacity to use when drawing using the fill color or fill texture.
   Fully opaque is 1.0.',
      'methodDescription' => 'Sets the opacity to use when drawing using the fill color or fill texture',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfillalpha.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'opacity',
          'description' => 'fill alpha',
        ),
      ),
    ),
    'setfillcolor' => 
    array (
      'functionName' => 'setFillColor',
      'description' => 'Sets the fill color to be used for drawing filled objects.',
      'methodDescription' => 'Sets the fill color to be used for drawing filled objects',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfillcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'fill_pixel',
          'description' => 'ImagickPixel to use to set the color',
        ),
      ),
    ),
    'setfillopacity' => 
    array (
      'functionName' => 'setFillOpacity',
      'description' => 'Sets the opacity to use when drawing using the fill color or fill texture.
   Fully opaque is 1.0.',
      'methodDescription' => 'Sets the opacity to use when drawing using the fill color or fill texture',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfillopacity.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'fillOpacity',
          'description' => 'the fill opacity',
        ),
      ),
    ),
    'setfillpatternurl' => 
    array (
      'functionName' => 'setFillPatternURL',
      'description' => 'Sets the URL to use as a fill pattern for filling objects. Only local URLs
   ("#identifier") are supported at this time. These local URLs are normally
   created by defining a named fill pattern with DrawPushPattern/DrawPopPattern.',
      'methodDescription' => 'Sets the URL to use as a fill pattern for filling objects',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'setfillpatternurl.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'fill_url',
          'description' => 'URL to use to obtain fill pattern.',
        ),
      ),
    ),
    'setfillrule' => 
    array (
      'functionName' => 'setFillRule',
      'description' => 'Sets the fill rule to use while drawing polygons.',
      'methodDescription' => 'Sets the fill rule to use while drawing polygons',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfillrule.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'fill_rule',
          'description' => 'FILLRULE_ constant',
        ),
      ),
    ),
    'setfont' => 
    array (
      'functionName' => 'setFont',
      'description' => 'Sets the fully-specified font to use when annotating with text.',
      'methodDescription' => 'Sets the fully-specified font to use when annotating with text',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'setfont.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'font_name',
          'description' => '',
        ),
      ),
    ),
    'setfontfamily' => 
    array (
      'functionName' => 'setFontFamily',
      'description' => 'Sets the font family to use when annotating with text.',
      'methodDescription' => 'Sets the font family to use when annotating with text',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'setfontfamily.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'font_family',
          'description' => 'the font family',
        ),
      ),
    ),
    'setfontsize' => 
    array (
      'functionName' => 'setFontSize',
      'description' => 'Sets the font pointsize to use when annotating with text.',
      'methodDescription' => 'Sets the font pointsize to use when annotating with text',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfontsize.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'pointsize',
          'description' => 'the point size',
        ),
      ),
    ),
    'setfontstretch' => 
    array (
      'functionName' => 'setFontStretch',
      'description' => 'Sets the font stretch to use when annotating with text. The AnyStretch
   enumeration acts as a wild-card "don\'t care" option.',
      'methodDescription' => 'Sets the font stretch to use when annotating with text',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfontstretch.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'fontStretch',
          'description' => 'STRETCH_ constant',
        ),
      ),
    ),
    'setfontstyle' => 
    array (
      'functionName' => 'setFontStyle',
      'description' => 'Sets the font style to use when annotating with text. The AnyStyle
   enumeration acts as a wild-card "don\'t care" option.',
      'methodDescription' => 'Sets the font style to use when annotating with text',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfontstyle.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'style',
          'description' => 'STYLETYPE_ constant',
        ),
      ),
    ),
    'setfontweight' => 
    array (
      'functionName' => 'setFontWeight',
      'description' => 'Sets the font weight to use when annotating with text.',
      'methodDescription' => 'Sets the font weight',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'setfontweight.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'font_weight',
          'description' => '',
        ),
      ),
    ),
    'setgravity' => 
    array (
      'functionName' => 'setGravity',
      'description' => 'Sets the text placement gravity to use when annotating with text.',
      'methodDescription' => 'Sets the text placement gravity',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setgravity.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'gravity',
          'description' => 'GRAVITY_ constant',
        ),
      ),
    ),
    'setstrokealpha' => 
    array (
      'functionName' => 'setStrokeAlpha',
      'description' => 'Specifies the opacity of stroked object outlines.',
      'methodDescription' => 'Specifies the opacity of stroked object outlines',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokealpha.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'opacity',
          'description' => 'opacity',
        ),
      ),
    ),
    'setstrokeantialias' => 
    array (
      'functionName' => 'setStrokeAntialias',
      'description' => 'Controls whether stroked outlines are antialiased. Stroked outlines are
   antialiased by default.  When antialiasing is disabled stroked pixels are
   thresholded to determine if the stroke color or underlying canvas color
   should be used.',
      'methodDescription' => 'Controls whether stroked outlines are antialiased',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokeantialias.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'stroke_antialias',
          'description' => 'the antialias setting',
        ),
      ),
    ),
    'setstrokecolor' => 
    array (
      'functionName' => 'setStrokeColor',
      'description' => 'Sets the color used for stroking object outlines.',
      'methodDescription' => 'Sets the color used for stroking object outlines',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokecolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'stroke_pixel',
          'description' => 'the stroke color',
        ),
      ),
    ),
    'setstrokedasharray' => 
    array (
      'functionName' => 'setStrokeDashArray',
      'description' => 'Specifies the pattern of dashes and gaps used to stroke paths. The
   strokeDashArray represents an array of numbers that specify the lengths of
   alternating dashes and gaps in pixels. If an odd number of values is
   provided, then the list of values is repeated to yield an even number of
   values. To remove an existing dash array, pass a zero number_elements
   argument and null dash_array. A typical strokeDashArray_ array might
   contain the members 5 3 2.',
      'methodDescription' => 'Specifies the pattern of dashes and gaps used to stroke paths',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokedasharray.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'dashArray',
          'description' => 'array of floats',
        ),
      ),
    ),
    'setstrokedashoffset' => 
    array (
      'functionName' => 'setStrokeDashOffset',
      'description' => 'Specifies the offset into the dash pattern to start the dash.',
      'methodDescription' => 'Specifies the offset into the dash pattern to start the dash',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokedashoffset.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'dash_offset',
          'description' => 'dash offset',
        ),
      ),
    ),
    'setstrokelinecap' => 
    array (
      'functionName' => 'setStrokeLineCap',
      'description' => 'Specifies the shape to be used at the end of open subpaths when they
   are stroked.',
      'methodDescription' => 'Specifies the shape to be used at the end of open subpaths when they are stroked',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokelinecap.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'linecap',
          'description' => 'LINECAP_ constant',
        ),
      ),
    ),
    'setstrokelinejoin' => 
    array (
      'functionName' => 'setStrokeLineJoin',
      'description' => 'Specifies the shape to be used at the corners of paths (or other vector 
   shapes) when they are stroked.',
      'methodDescription' => 'Specifies the shape to be used at the corners of paths when they are stroked',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokelinejoin.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'linejoin',
          'description' => 'LINEJOIN_ constant',
        ),
      ),
    ),
    'setstrokemiterlimit' => 
    array (
      'functionName' => 'setStrokeMiterLimit',
      'description' => 'Specifies the miter limit. When two line segments meet at a sharp angle
   and miter joins have been specified for \'lineJoin\', it is possible for
   the miter to extend far beyond the thickness of the line stroking the 
   path. The miterLimit\' imposes a limit on the ratio of the miter length to
   the \'lineWidth\'.',
      'methodDescription' => 'Specifies the miter limit',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokemiterlimit.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'miterlimit',
          'description' => 'the miter limit',
        ),
      ),
    ),
    'setstrokeopacity' => 
    array (
      'functionName' => 'setStrokeOpacity',
      'description' => 'Specifies the opacity of stroked object outlines.',
      'methodDescription' => 'Specifies the opacity of stroked object outlines',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokeopacity.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'stroke_opacity',
          'description' => 'stroke opacity. 1.0 is fully opaque',
        ),
      ),
    ),
    'setstrokepatternurl' => 
    array (
      'functionName' => 'setStrokePatternURL',
      'description' => 'Sets the pattern used for stroking object outlines.',
      'methodDescription' => 'Sets the pattern used for stroking object outlines',
      'returnType' => 'imagick.imagickdraw.return.success;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokepatternurl.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'stroke_url',
          'description' => 'stroke URL',
        ),
      ),
    ),
    'setstrokewidth' => 
    array (
      'functionName' => 'setStrokeWidth',
      'description' => 'Sets the width of the stroke used to draw object outlines.',
      'methodDescription' => 'Sets the width of the stroke used to draw object outlines',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokewidth.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'stroke_width',
          'description' => 'stroke width',
        ),
      ),
    ),
    'settextalignment' => 
    array (
      'functionName' => 'setTextAlignment',
      'description' => 'Specifies a text alignment to be applied when annotating with text.',
      'methodDescription' => 'Specifies a text alignment',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextalignment.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'alignment',
          'description' => 'ALIGN_ constant',
        ),
      ),
    ),
    'settextantialias' => 
    array (
      'functionName' => 'setTextAntialias',
      'description' => 'Controls whether text is antialiased. Text is antialiased by default.',
      'methodDescription' => 'Controls whether text is antialiased',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextantialias.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'antiAlias',
          'description' => '',
        ),
      ),
    ),
    'settextdecoration' => 
    array (
      'functionName' => 'setTextDecoration',
      'description' => 'Specifies a decoration to be applied when annotating with text.',
      'methodDescription' => 'Specifies a decoration',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextdecoration.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'decoration',
          'description' => 'DECORATION_ constant',
        ),
      ),
    ),
    'settextencoding' => 
    array (
      'functionName' => 'setTextEncoding',
      'description' => 'Specifies the code set to use for text annotations. The only
   character encoding which may be specified at this time is "UTF-8" for
   representing Unicode as a sequence of bytes. Specify an empty string to
   set text encoding to the system\'s default. Successful text annotation
   using Unicode may require fonts designed to support Unicode.',
      'methodDescription' => 'Specifies the text code set',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextencoding.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'encoding',
          'description' => 'the encoding name',
        ),
      ),
    ),
    'settextundercolor' => 
    array (
      'functionName' => 'setTextUnderColor',
      'description' => 'Specifies the color of a background rectangle to place under text annotations.',
      'methodDescription' => 'Specifies the color of a background rectangle',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextundercolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'under_color',
          'description' => 'the under color',
        ),
      ),
    ),
    'setvectorgraphics' => 
    array (
      'functionName' => 'setVectorGraphics',
      'description' => 'Sets the vector graphics associated with the specified ImagickDraw
   object. Use this method with ImagickDraw::getVectorGraphics() as a method
   to persist the vector graphics state.',
      'methodDescription' => 'Sets the vector graphics',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'setvectorgraphics.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'xml',
          'description' => 'xml containing the vector graphics',
        ),
      ),
    ),
    'setviewbox' => 
    array (
      'functionName' => 'setViewbox',
      'description' => 'Sets the overall canvas size to be recorded with the drawing vector data.
   Usually this will be specified using the same size as the canvas image.
   When the vector data is saved to SVG or MVG formats, the viewbox is use to
   specify the size of the canvas image that a viewer will render the vector
   data on.',
      'methodDescription' => 'Sets the overall canvas size',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setviewbox.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x1',
          'description' => 'left x coordinate',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y1',
          'description' => 'left y coordinate',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x2',
          'description' => 'right x coordinate',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y2',
          'description' => 'right y coordinate',
        ),
      ),
    ),
    'skewx' => 
    array (
      'functionName' => 'skewX',
      'description' => 'Skews the current coordinate system in the horizontal direction.',
      'methodDescription' => 'Skews the current coordinate system in the horizontal direction',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'skewx.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => 'degrees to skew',
        ),
      ),
    ),
    'skewy' => 
    array (
      'functionName' => 'skewY',
      'description' => 'Skews the current coordinate system in the vertical direction.',
      'methodDescription' => 'Skews the current coordinate system in the vertical direction',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'skewy.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => 'degrees to skew',
        ),
      ),
    ),
    'translate' => 
    array (
      'functionName' => 'translate',
      'description' => 'Applies a translation to the current coordinate system which moves the
   coordinate system origin to the specified coordinate.',
      'methodDescription' => 'Applies a translation to the current coordinate system',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'translate.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'horizontal translation',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'vertical translation',
        ),
      ),
    ),
  ),
  'imagick' => 
  array (
    'adaptiveblurimage' => 
    array (
      'functionName' => 'adaptiveBlurImage',
      'description' => 'Adds an adaptive blur filter to image. The intensity of an adaptive blur
   depends is dramatically decreased at edge of the image, whereas a standard
   blur is uniform across the image. This method is available if Imagick has been compiled against ImageMagick version 6.2.9 or newer.',
      'methodDescription' => 'Adds adaptive blur filter to image',
      'returnType' => 'Returns True; on success.',
      'classname' => 'imagick',
      'method' => 'adaptiveblurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel.
       Provide a value of 0 and the radius will be chosen automagically.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To apply to more than one channel, combine channel constants using bitwise operators. Defaults to Imagick::CHANNEL_DEFAULT. Refer to this list of channel constants',
        ),
      ),
    ),
    'adaptiveresizeimage' => 
    array (
      'functionName' => 'adaptiveResizeImage',
      'description' => 'Adaptively resize image with data-dependent triangulation. Avoids
   blurring across sharp color changes. Most useful when used to shrink
   images slightly to a slightly smaller "web size"; may not look good
   when a full-sized image is adaptively resized to a thumbnail.
   Available since 6.2.9',
      'methodDescription' => 'Adaptively resize image with data dependent triangulation',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'adaptiveresizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'The number of columns in the scaled image.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'The number of rows in the scaled image.',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => 'Whether to fit the image inside a bounding box.',
        ),
      ),
    ),
    'adaptivesharpenimage' => 
    array (
      'functionName' => 'adaptiveSharpenImage',
      'description' => 'Adaptively sharpen the image by sharpening more intensely
   near image edges and less intensely far from edges. Available since 6.2.9',
      'methodDescription' => 'Adaptively sharpen the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'adaptivesharpenimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel. Use 0 for auto-select.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'adaptivethresholdimage' => 
    array (
      'functionName' => 'adaptiveThresholdImage',
      'description' => 'Selects an individual threshold for each pixel based on the
   range of intensity values in its local neighborhood.  This
   allows for thresholding of an image whose global intensity
   histogram doesn\'t contain distinctive peaks.',
      'methodDescription' => 'Selects a threshold for each pixel based on a range of intensity',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'adaptivethresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'Width of the local neighborhood.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'Height of the local neighborhood.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'offset',
          'description' => 'The mean offset',
        ),
      ),
    ),
    'addimage' => 
    array (
      'functionName' => 'addImage',
      'description' => 'Adds new image to Imagick object from the current position of the source object.
   After the operation iterator position is moved at the end of the list.',
      'methodDescription' => 'Adds new image to Imagick object image list',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'addimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'source',
          'description' => 'The source Imagick object',
        ),
      ),
    ),
    'addnoiseimage' => 
    array (
      'functionName' => 'addNoiseImage',
      'description' => 'Adds random noise to the image.',
      'methodDescription' => 'Adds random noise to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'addnoiseimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'noise_type',
          'description' => 'The type of the noise. Refer to this list of
       noise constants.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'affinetransformimage' => 
    array (
      'functionName' => 'affineTransformImage',
      'description' => 'Transforms an image as dictated by the affine matrix.',
      'methodDescription' => 'Transforms an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'affinetransformimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'matrix',
          'description' => 'The affine matrix',
        ),
      ),
    ),
    'animateimages' => 
    array (
      'functionName' => 'animateImages',
      'description' => 'This method animates the image onto a local or remote X server. This method
   is not available on Windows.
   Available since 6.3.6',
      'methodDescription' => 'Animates an image or images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'animateimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'x_server',
          'description' => 'X server address',
        ),
      ),
    ),
    'annotateimage' => 
    array (
      'functionName' => 'annotateImage',
      'description' => 'Annotates an image with text.',
      'methodDescription' => 'Annotates an image with text',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'annotateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'draw_settings',
          'description' => 'The ImagickDraw object that contains settings for drawing the text',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'Horizontal offset in pixels to the left of text',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'Vertical offset in pixels to the baseline of text',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => 'The angle at which to write the text',
        ),
        4 => 
        array (
          'type' => 'string',
          'name' => 'text',
          'description' => 'The string to draw',
        ),
      ),
    ),
    'appendimages' => 
    array (
      'functionName' => 'appendImages',
      'description' => 'Append a set of images into one larger image.',
      'methodDescription' => 'Append a set of images',
      'returnType' => 'Returns Imagick instance on success.',
      'classname' => 'imagick',
      'method' => 'appendimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'stack',
          'description' => 'Whether to stack the images vertically.
       By default (or if False; is specified) images are stacked left-to-right.
       If stack is True;, images are stacked top-to-bottom.',
        ),
      ),
    ),
    'averageimages' => 
    array (
      'functionName' => 'averageImages',
      'description' => 'Average a set of images.',
      'methodDescription' => 'Average a set of images',
      'returnType' => 'Returns a new Imagick object on success.',
      'classname' => 'imagick',
      'method' => 'averageimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'blackthresholdimage' => 
    array (
      'functionName' => 'blackThresholdImage',
      'description' => 'Is like Imagick::thresholdImage() but forces all pixels below the threshold
   into black while leaving all pixels above the threshold unchanged.',
      'methodDescription' => 'Forces all pixels below the threshold into black',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'blackthresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'threshold',
          'description' => 'The threshold below which everything turns black',
        ),
      ),
    ),
    'blurimage' => 
    array (
      'functionName' => 'blurImage',
      'description' => 'Adds blur filter to image. Optional third parameter to blur a specific
   channel.',
      'methodDescription' => 'Adds blur filter to image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'blurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'Blur radius',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'Standard deviation',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'The Channeltype
       constant. When not supplied, all channels are blurred.',
        ),
      ),
    ),
    'borderimage' => 
    array (
      'functionName' => 'borderImage',
      'description' => 'Surrounds the image with a border of the color defined by the bordercolor ImagickPixel object.',
      'methodDescription' => 'Surrounds the image with a border',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'borderimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'bordercolor',
          'description' => 'ImagickPixel object or a string containing the border color',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'Border width',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'Border height',
        ),
      ),
    ),
    'charcoalimage' => 
    array (
      'functionName' => 'charcoalImage',
      'description' => 'Simulates a charcoal drawing.',
      'methodDescription' => 'Simulates a charcoal drawing',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'charcoalimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels',
        ),
      ),
    ),
    'chopimage' => 
    array (
      'functionName' => 'chopImage',
      'description' => 'Removes a region of an image and collapses the image to occupy the removed portion.',
      'methodDescription' => 'Removes a region of an image and trims',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'chopimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'Width of the chopped area',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'Height of the chopped area',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X origo of the chopped area',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y origo of the chopped area',
        ),
      ),
    ),
    'clear' => 
    array (
      'functionName' => 'clear',
      'description' => 'Clears all resources associated to Imagick object',
      'methodDescription' => 'Clears all resources associated to Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'clear.xml',
      'parameters' => 
      array (
      ),
    ),
    'clipimage' => 
    array (
      'functionName' => 'clipImage',
      'description' => 'Clips along the first path from the 8BIM profile, if present.',
      'methodDescription' => 'Clips along the first path from the 8BIM profile',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'clipimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'clippathimage' => 
    array (
      'functionName' => 'clipPathImage',
      'description' => 'Clips along the named paths from the 8BIM profile, if
   present. Later operations take effect inside the path.
   It may be a number if preceded with #, to work on a
   numbered path, e.g., "#1" to use the first path.',
      'methodDescription' => 'Clips along the named paths from the 8BIM profile',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'clippathimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pathname',
          'description' => 'The name of the path',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'inside',
          'description' => 'If True; later operations take effect inside clipping path.
       Otherwise later operations take effect outside clipping path.',
        ),
      ),
    ),
    'clone' => 
    array (
      'functionName' => 'clone',
      'description' => 'Makes an exact copy of the Imagick object.',
      'methodDescription' => 'Makes an exact copy of the Imagick object',
      'returnType' => 'A copy of the Imagick object is returned.',
      'classname' => 'imagick',
      'method' => 'clone.xml',
      'parameters' => 
      array (
      ),
    ),
    'clutimage' => 
    array (
      'functionName' => 'clutImage',
      'description' => 'Replaces colors in the image from a color lookup table. Optional second
   parameter to replace colors in a specific channel. Available since 6.3.6',
      'methodDescription' => 'Replaces colors in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'clutimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'lookup_table',
          'description' => 'Imagick object containing the color lookup table',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'channel',
          'description' => 'The Channeltype
       constant. When not supplied, default channels are replaced.',
        ),
      ),
    ),
    'coalesceimages' => 
    array (
      'functionName' => 'coalesceImages',
      'description' => 'Composites a set of images while respecting any page offsets
   and disposal methods.  GIF, MIFF, and MNG animation sequences
   typically start with an image background and each subsequent
   image varies in size and offset.  Returns a new Imagick object
   where each image in the sequence is the same size as the first
   and composited with the next image in the sequence.',
      'methodDescription' => 'Composites a set of images',
      'returnType' => 'Returns a new Imagick object on success.',
      'classname' => 'imagick',
      'method' => 'coalesceimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'colorfloodfillimage' => 
    array (
      'functionName' => 'colorFloodfillImage',
      'description' => 'Changes the color value of any pixel that matches target and is an
   immediate neighbor.',
      'methodDescription' => 'Changes the color value of any pixel that matches target',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'colorfloodfillimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'fill',
          'description' => 'ImagickPixel object containing the fill color',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The amount of fuzz. For example, set fuzz to 10 and the color red at
       intensities of 100 and 102 respectively are now interpreted as the
       same color for the purposes of the floodfill.',
        ),
        2 => 
        array (
          'type' => 'mixed',
          'name' => 'bordercolor',
          'description' => 'ImagickPixel object containing the border color',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X start position of the floodfill',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y start position of the floodfill',
        ),
      ),
    ),
    'colorizeimage' => 
    array (
      'functionName' => 'colorizeImage',
      'description' => 'Blends the fill color with each pixel in the image.',
      'methodDescription' => 'Blends the fill color with the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'colorizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'colorize',
          'description' => 'ImagickPixel object or a string containing the colorize color',
        ),
        1 => 
        array (
          'type' => 'mixed',
          'name' => 'opacity',
          'description' => 'ImagickPixel object or an float containing the opacity value. 
       1.0 is fully opaque and 0.0 is fully transparent.',
        ),
      ),
    ),
    'combineimages' => 
    array (
      'functionName' => 'combineImages',
      'description' => 'Combines one or more images into a single image. The grayscale
   value of the pixels of each image in the sequence is assigned
   in order to the specified channels of the combined image. The
   typical ordering would be image 1 => Red, 2 => Green,
   3 => Blue, etc.',
      'methodDescription' => 'Combines one or more images into a single image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'combineimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channelType',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'commentimage' => 
    array (
      'functionName' => 'commentImage',
      'description' => 'Adds a comment to your image.',
      'methodDescription' => 'Adds a comment to your image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'commentimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'comment',
          'description' => 'The comment to add',
        ),
      ),
    ),
    'compareimagechannels' => 
    array (
      'functionName' => 'compareImageChannels',
      'description' => 'Compares one or more images and returns the difference image.',
      'methodDescription' => 'Returns the difference in one or more images',
      'returnType' => 'Array consisting of new_wand and
   distortion.',
      'classname' => 'imagick',
      'method' => 'compareimagechannels.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'image',
          'description' => 'Imagick object containing the image to compare.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channelType',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'metricType',
          'description' => 'One of the metric type constants.',
        ),
      ),
    ),
    'compareimagelayers' => 
    array (
      'functionName' => 'compareImageLayers',
      'description' => 'Compares each image with the next in a sequence and returns the
   maximum bounding region of any pixel differences it discovers.
   Available since 6.2.9',
      'methodDescription' => 'Returns the maximum bounding region between images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'compareimagelayers.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'method',
          'description' => 'One of the layer method constants.',
        ),
      ),
    ),
    'compareimages' => 
    array (
      'functionName' => 'compareImages',
      'description' => 'Returns an array containing a reconstructed image and the difference between images.',
      'methodDescription' => 'Compares an image to a reconstructed image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'compareimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'compare',
          'description' => 'An image to compare to.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'metric',
          'description' => 'Provide a valid metric type constant. Refer to this
       list of  metric constants.',
        ),
      ),
    ),
    'compositeimage' => 
    array (
      'functionName' => 'compositeImage',
      'description' => 'Composite one image onto another at the specified offset.',
      'methodDescription' => 'Composite one image onto another',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'compositeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'composite_object',
          'description' => 'Imagick object which holds the composite image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'composite',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The column offset of the composited image',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The row offset of the composited image',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this list of channel constants.',
        ),
      ),
    ),
    'construct' => 
    array (
      'functionName' => '__construct',
      'description' => 'Creates an Imagick instance for a specified image or set of images.',
      'methodDescription' => 'The Imagick constructor',
      'returnType' => 'Returns a new Imagick object on success.',
      'classname' => 'imagick',
      'method' => 'construct.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'files',
          'description' => '',
        ),
      ),
    ),
    'contrastimage' => 
    array (
      'functionName' => 'contrastImage',
      'description' => 'Enhances the intensity differences between the lighter and
   darker elements of the image.  Set sharpen to a value other
   than 0 to increase the image contrast otherwise the contrast
   is reduced.',
      'methodDescription' => 'Change the contrast of the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'contrastimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'sharpen',
          'description' => 'The sharpen value',
        ),
      ),
    ),
    'contraststretchimage' => 
    array (
      'functionName' => 'contrastStretchImage',
      'description' => 'Enhances the contrast of a color image by adjusting the pixels
   color to span the entire range of colors available. Available since 6.2.9',
      'methodDescription' => 'Enhances the contrast of a color image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'contraststretchimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'black_point',
          'description' => 'The black point.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'white_point',
          'description' => 'The white point.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Imagick::CHANNEL_ALL. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'convolveimage' => 
    array (
      'functionName' => 'convolveImage',
      'description' => 'Applies a custom convolution kernel to the image.',
      'methodDescription' => 'Applies a custom convolution kernel to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'convolveimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'kernel',
          'description' => 'The convolution kernel',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'cropimage' => 
    array (
      'functionName' => 'cropImage',
      'description' => 'Extracts a region of the image.',
      'methodDescription' => 'Extracts a region of the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'cropimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the crop',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The height of the crop',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The X coordinate of the cropped region\'s top left corner',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The Y coordinate of the cropped region\'s top left corner',
        ),
      ),
    ),
    'cropthumbnailimage' => 
    array (
      'functionName' => 'cropThumbnailImage',
      'description' => 'Creates a fixed size thumbnail by first scaling the image up or down and cropping a specified
  area from the center.',
      'methodDescription' => 'Creates a crop thumbnail',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'cropthumbnailimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the thumbnail',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The Height of the thumbnail',
        ),
      ),
    ),
    'current' => 
    array (
      'functionName' => 'current',
      'description' => 'Returns reference to the current imagick object with image pointer at the correct sequence.',
      'methodDescription' => 'Returns a reference to the current Imagick object',
      'returnType' => 'Returns self on success.',
      'classname' => 'imagick',
      'method' => 'current.xml',
      'parameters' => 
      array (
      ),
    ),
    'cyclecolormapimage' => 
    array (
      'functionName' => 'cycleColormapImage',
      'description' => 'Displaces an image\'s colormap by a given number of positions.  If you
   cycle the colormap a number of times you can produce a psychedelic
   effect.',
      'methodDescription' => 'Displaces an image\'s colormap',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'cyclecolormapimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'displace',
          'description' => 'The amount to displace the colormap.',
        ),
      ),
    ),
    'decipherimage' => 
    array (
      'functionName' => 'decipherImage',
      'description' => 'Deciphers image that has been enciphered before. The image must be enciphered
   using Imagick::encipherImage.
   Available since 6.3.9',
      'methodDescription' => 'Deciphers an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'decipherimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'passphrase',
          'description' => 'The passphrase',
        ),
      ),
    ),
    'deconstructimages' => 
    array (
      'functionName' => 'deconstructImages',
      'description' => 'Compares each image with the next in a sequence and returns the maximum
   bounding region of any pixel differences it discovers.',
      'methodDescription' => 'Returns certain pixel differences between images',
      'returnType' => 'Returns a new Imagick object on success.',
      'classname' => 'imagick',
      'method' => 'deconstructimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'deleteimageartifact' => 
    array (
      'functionName' => 'deleteImageArtifact',
      'description' => 'Deletes an artifact associated with the image.  The difference between image properties and 
   image artifacts is that properties are public and artifacts are private.
   Available since 6.5.7',
      'methodDescription' => 'Delete image artifact',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'deleteimageartifact.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'artifact',
          'description' => 'The name of the artifact to delete',
        ),
      ),
    ),
    'deskewimage' => 
    array (
      'functionName' => 'deskewImage',
      'description' => 'This method can be used to remove skew from for example scanned images where the paper
   was not properly placed on the scanning surface. Available since 6.4.5',
      'methodDescription' => 'Removes skew from the image',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'deskewimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'threshold',
          'description' => 'Deskew threshold',
        ),
      ),
    ),
    'despeckleimage' => 
    array (
      'functionName' => 'despeckleImage',
      'description' => 'Reduces the speckle noise in an image while preserving the edges of the original image.',
      'methodDescription' => 'Reduces the speckle noise in an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'despeckleimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'destroy' => 
    array (
      'functionName' => 'destroy',
      'description' => 'Destroys the Imagick object and frees all resources associated with it. 
   This method is deprecated in favour of Imagick::clear.',
      'methodDescription' => 'Destroys the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'destroy.xml',
      'parameters' => 
      array (
      ),
    ),
    'displayimage' => 
    array (
      'functionName' => 'displayImage',
      'description' => 'This method displays an image on a X server.',
      'methodDescription' => 'Displays an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'displayimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'servername',
          'description' => 'The X server name',
        ),
      ),
    ),
    'displayimages' => 
    array (
      'functionName' => 'displayImages',
      'description' => 'Displays an image or image sequence on a X server.',
      'methodDescription' => 'Displays an image or image sequence',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'displayimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'servername',
          'description' => 'The X server name',
        ),
      ),
    ),
    'distortimage' => 
    array (
      'functionName' => 'distortImage',
      'description' => 'Available since 6.3.6',
      'methodDescription' => 'Distorts an image using various distortion methods',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'distortimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'method',
          'description' => 'The method of image distortion. See distortion constants',
        ),
        1 => 
        array (
          'type' => 'array',
          'name' => 'arguments',
          'description' => 'The arguments for this distortion method',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => 'Attempt to resize destination to fit distorted source',
        ),
      ),
    ),
    'drawimage' => 
    array (
      'functionName' => 'drawImage',
      'description' => 'Renders the ImagickDraw object on the current image.',
      'methodDescription' => 'Renders the ImagickDraw object on the current image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'drawimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'draw',
          'description' => 'The drawing operations to render on the image.',
        ),
      ),
    ),
    'edgeimage' => 
    array (
      'functionName' => 'edgeImage',
      'description' => 'Enhance edges within the image with a convolution filter of the given
   radius. Use radius 0 and it will be auto-selected.',
      'methodDescription' => 'Enhance edges within the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'edgeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the operation.',
        ),
      ),
    ),
    'embossimage' => 
    array (
      'functionName' => 'embossImage',
      'description' => 'Returns a grayscale image with a three-dimensional effect.  We convolve
   the image with a Gaussian operator of the given radius and standard 
   deviation (sigma).  For reasonable results, radius should be larger than 
   sigma.  Use a radius of 0 and it will choose a suitable radius for you.',
      'methodDescription' => 'Returns a grayscale image with a three-dimensional effect',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'embossimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the effect',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The sigma of the effect',
        ),
      ),
    ),
    'encipherimage' => 
    array (
      'functionName' => 'encipherImage',
      'description' => 'Converts plain pixels to enciphered pixels. The image is not readable
   until it has been deciphered using Imagick::decipherImage
   Available since 6.3.9',
      'methodDescription' => 'Enciphers an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'encipherimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'passphrase',
          'description' => 'The passphrase',
        ),
      ),
    ),
    'enhanceimage' => 
    array (
      'functionName' => 'enhanceImage',
      'description' => 'Applies a digital filter that improves the quality of a noisy image.',
      'methodDescription' => 'Improves the quality of a noisy image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'enhanceimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'equalizeimage' => 
    array (
      'functionName' => 'equalizeImage',
      'description' => 'Equalizes the image histogram.',
      'methodDescription' => 'Equalizes the image histogram',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'equalizeimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'evaluateimage' => 
    array (
      'functionName' => 'evaluateImage',
      'description' => 'Applys an arithmetic, relational, or logical expression to an image.  Use
   these operators to lighten or darken an image, to increase or decrease
   contrast in an image, or to produce the "negative" of an image.',
      'methodDescription' => 'Applies an expression to an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'evaluateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'op',
          'description' => 'The evaluation operator',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'constant',
          'description' => 'The value of the operator',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'exportimagepixels' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'exportimagepixels.xml',
      'parameters' => 
      array (
      ),
    ),
    'extentimage' => 
    array (
      'functionName' => 'extentImage',
      'description' => 'Comfortability method for setting image size. The method sets the image size and allows
   setting x,y coordinates where the new area begins.
   Available since 6.3.1',
      'methodDescription' => 'Set image size',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'extentimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The new width',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The new height',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X position for the new size',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y position for the new size',
        ),
      ),
    ),
    'flattenimages' => 
    array (
      'functionName' => 'flattenImages',
      'description' => 'Merges a sequence of images.  This is useful for combining Photoshop layers into a single image.',
      'methodDescription' => 'Merges a sequence of images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'flattenimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'flipimage' => 
    array (
      'functionName' => 'flipImage',
      'description' => 'Creates a vertical mirror image by reflecting the pixels around the central x-axis.',
      'methodDescription' => 'Creates a vertical mirror image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'flipimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'floodfillpaintimage' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'floodfillpaintimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'flopimage' => 
    array (
      'functionName' => 'flopImage',
      'description' => 'Creates a horizontal mirror image by reflecting the pixels around the central y-axis.',
      'methodDescription' => 'Creates a horizontal mirror image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'flopimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'frameimage' => 
    array (
      'functionName' => 'frameImage',
      'description' => 'Adds a simulated three-dimensional border around the image.
   The width and height specify the border width of the vertical
   and horizontal sides of the frame.  The inner and outer
   bevels indicate the width of the inner and outer shadows of
   the frame.',
      'methodDescription' => 'Adds a simulated three-dimensional border',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'frameimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'matte_color',
          'description' => 'ImagickPixel object or a string representing the matte color',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the border',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The height of the border',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'inner_bevel',
          'description' => 'The inner bevel width',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'outer_bevel',
          'description' => 'The outer bevel width',
        ),
      ),
    ),
    'functionimage' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'functionimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'fximage' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'fximage.xml',
      'parameters' => 
      array (
      ),
    ),
    'gammaimage' => 
    array (
      'functionName' => 'gammaImage',
      'description' => 'Gamma-corrects an image.  The same image viewed on different devices will
   have perceptual differences in the way the image\'s intensities are
   represented on the screen.  Specify individual gamma levels for the red,
   green, and blue channels, or adjust all three with the gamma parameter.
   Values typically range from 0.8 to 2.3.',
      'methodDescription' => 'Gamma-corrects an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'gammaimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'gamma',
          'description' => 'The amount of gamma-correction.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'gaussianblurimage' => 
    array (
      'functionName' => 'gaussianBlurImage',
      'description' => 'Blurs an image.  We convolve the image with a Gaussian operator of the
   given radius and standard deviation (sigma). For reasonable results, the
   radius should be larger than sigma.  Use a radius of 0 and selects a
   suitable radius for you.',
      'methodDescription' => 'Blurs an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'gaussianblurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'getcolorspace' => 
    array (
      'functionName' => 'getColorspace',
      'description' => 'Gets the global colorspace value.
   Available since 6.5.7',
      'methodDescription' => 'Gets the colorspace',
      'returnType' => 'Returns an integer which can be compared against COLORSPACE constants.',
      'classname' => 'imagick',
      'method' => 'getcolorspace.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcompression' => 
    array (
      'functionName' => 'getCompression',
      'description' => 'Gets the object compression type.',
      'methodDescription' => 'Gets the object compression type',
      'returnType' => 'Returns the compression constant',
      'classname' => 'imagick',
      'method' => 'getcompression.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcompressionquality' => 
    array (
      'functionName' => 'getCompressionQuality',
      'description' => 'Gets the object compression quality.',
      'methodDescription' => 'Gets the object compression quality',
      'returnType' => 'Returns integer describing the compression quality',
      'classname' => 'imagick',
      'method' => 'getcompressionquality.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcopyright' => 
    array (
      'functionName' => 'getCopyright',
      'description' => 'Returns the ImageMagick API copyright as a string.',
      'methodDescription' => 'Returns the ImageMagick API copyright as a string',
      'returnType' => 'Returns a string containing the copyright notice of Imagemagick and
   Magickwand C API.',
      'classname' => 'imagick',
      'method' => 'getcopyright.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfilename' => 
    array (
      'functionName' => 'getFilename',
      'description' => 'Returns the filename associated with an image sequence.',
      'methodDescription' => 'The filename associated with an image sequence',
      'returnType' => 'Returns a string on success.',
      'classname' => 'imagick',
      'method' => 'getfilename.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfont' => 
    array (
      'functionName' => 'getFont',
      'description' => 'Returns the objects font property.
   Available since 6.3.7',
      'methodDescription' => 'Gets font',
      'returnType' => 'Returns the string containing the font name or False; if not font is set.',
      'classname' => 'imagick',
      'method' => 'getfont.xml',
      'parameters' => 
      array (
      ),
    ),
    'getformat' => 
    array (
      'functionName' => 'getFormat',
      'description' => 'Returns the format of the Imagick object.',
      'methodDescription' => 'Returns the format of the Imagick object',
      'returnType' => 'Returns the format of the image.',
      'classname' => 'imagick',
      'method' => 'getformat.xml',
      'parameters' => 
      array (
      ),
    ),
    'getgravity' => 
    array (
      'functionName' => 'getGravity',
      'description' => 'Gets the global gravity property for the Imagick object.
   Available since 6.4.0',
      'methodDescription' => 'Gets the gravity',
      'returnType' => 'Returns the gravity property. Refer to the list of 
   gravity constants.',
      'classname' => 'imagick',
      'method' => 'getgravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'gethomeurl' => 
    array (
      'functionName' => 'getHomeURL',
      'description' => 'Returns the ImageMagick home URL.',
      'methodDescription' => 'Returns the ImageMagick home URL',
      'returnType' => 'Returns a link to the imagemagick homepage.',
      'classname' => 'imagick',
      'method' => 'gethomeurl.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimage' => 
    array (
      'functionName' => 'getImage',
      'description' => 'Returns a new Imagick object with the current image sequence.',
      'methodDescription' => 'Returns a new Imagick object',
      'returnType' => 'Returns a new Imagick object with the current image sequence.',
      'classname' => 'imagick',
      'method' => 'getimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagealphachannel' => 
    array (
      'functionName' => 'getImageAlphaChannel',
      'description' => 'Gets the image alpha channel value. The returned value is one of the 
   alpha channel constants.
   Available since 6.4.0',
      'methodDescription' => 'Gets the image alpha channel',
      'returnType' => 'Returns a constant defining the current alpha channel value. Refer to this
   list of alpha channel constants.',
      'classname' => 'imagick',
      'method' => 'getimagealphachannel.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageartifact' => 
    array (
      'functionName' => 'getImageArtifact',
      'description' => 'Gets an artifact associated with the image.  The difference between image properties and 
   image artifacts is that properties are public and artifacts are private.
   Available since 6.5.7',
      'methodDescription' => 'Get image artifact',
      'returnType' => 'Returns the artifact value on success.',
      'classname' => 'imagick',
      'method' => 'getimageartifact.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'artifact',
          'description' => 'The name of the artifact',
        ),
      ),
    ),
    'getimagebackgroundcolor' => 
    array (
      'functionName' => 'getImageBackgroundColor',
      'description' => 'Returns the image background color.',
      'methodDescription' => 'Returns the image background color',
      'returnType' => 'Returns an ImagickPixel set to the background color of the image.',
      'classname' => 'imagick',
      'method' => 'getimagebackgroundcolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageblob' => 
    array (
      'functionName' => 'getImageBlob',
      'description' => 'Implements direct to memory image formats.  It returns the image
   sequence as a string.  The format of the image determines the
   format of the returned blob (GIF, JPEG, PNG, etc.). To return a
   different image format, use Imagick::setImageFormat().',
      'methodDescription' => 'Returns the image sequence as a blob',
      'returnType' => 'Returns a string containing the image.',
      'classname' => 'imagick',
      'method' => 'getimageblob.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageblueprimary' => 
    array (
      'functionName' => 'getImageBluePrimary',
      'description' => 'Returns the chromaticity blue primary point for the image.',
      'methodDescription' => 'Returns the chromaticy blue primary point',
      'returnType' => 'Array consisting of "x" and "y" coordinates of point.',
      'classname' => 'imagick',
      'method' => 'getimageblueprimary.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagebordercolor' => 
    array (
      'functionName' => 'getImageBorderColor',
      'description' => 'Returns the image border color.',
      'methodDescription' => 'Returns the image border color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagebordercolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagechanneldepth' => 
    array (
      'functionName' => 'getImageChannelDepth',
      'description' => 'Gets the depth for a particular image channel.',
      'methodDescription' => 'Gets the depth for a particular image channel',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechanneldepth.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'getimagechanneldistortion' => 
    array (
      'functionName' => 'getImageChannelDistortion',
      'description' => 'Compares one or more image channels of an image to a reconstructed image
   and returns the specified distortion metric.',
      'methodDescription' => 'Compares image channels of an image to a reconstructed image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechanneldistortion.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'reference',
          'description' => 'Imagick object to compare to.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'metric',
          'description' => 'One of the metric type constants.',
        ),
      ),
    ),
    'getimagechanneldistortions' => 
    array (
      'functionName' => 'getImageChannelDistortions',
      'description' => 'Compares one or more image channels of an image to a reconstructed image and returns the specified distortion metrics
   Available since 6.4.4',
      'methodDescription' => 'Gets channel distortions',
      'returnType' => 'Returns a double describing the channel distortion.',
      'classname' => 'imagick',
      'method' => 'getimagechanneldistortions.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'reference',
          'description' => 'Imagick object containing the reference image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'metric',
          'description' => 'Refer to this list of metric type constants.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'getimagechannelextrema' => 
    array (
      'functionName' => 'getImageChannelExtrema',
      'description' => 'Gets the extrema for one or more image channels.  Return value is an
   associative array with the keys "minima" and "maxima".',
      'methodDescription' => 'Gets the extrema for one or more image channels',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechannelextrema.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'getimagechannelkurtosis' => 
    array (
      'functionName' => 'getImageChannelKurtosis',
      'description' => 'Get the kurtosis and skewness of a specific channel. Available since 6.4.9',
      'methodDescription' => 'The getImageChannelKurtosis purpose',
      'returnType' => 'Returns an array with kurtosis and skewness
   members.',
      'classname' => 'imagick',
      'method' => 'getimagechannelkurtosis.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'getimagechannelmean' => 
    array (
      'functionName' => 'getImageChannelMean',
      'description' => 'Gets the mean and standard deviation of one or more image channels.
   Return value is an associative array with the keys "mean" and
   "standardDeviation".',
      'methodDescription' => 'Gets the mean and standard deviation',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechannelmean.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'getimagechannelrange' => 
    array (
      'functionName' => 'getImageChannelRange',
      'description' => 'Gets the range for one or more image channels.
   Available since 6.4.0',
      'methodDescription' => 'Gets channel range',
      'returnType' => 'Returns an array containing minima and maxima values of the channel(s).',
      'classname' => 'imagick',
      'method' => 'getimagechannelrange.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'getimagechannelstatistics' => 
    array (
      'functionName' => 'getImageChannelStatistics',
      'description' => 'Returns statistics for each channel in the image.  The statistics include
   the channel depth, its minima and maxima, the mean, and the standard
   deviation.  You can access the red channel mean, for example, like this:',
      'methodDescription' => 'Returns statistics for each channel in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechannelstatistics.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageclipmask' => 
    array (
      'functionName' => 'getImageClipMask',
      'description' => 'Returns the image clip mask. The clip mask is an Imagick object containing the clip mask.
   Available since 6.3.6',
      'methodDescription' => 'Gets image clip mask',
      'returnType' => 'Returns an Imagick object containing the clip mask.',
      'classname' => 'imagick',
      'method' => 'getimageclipmask.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecolormapcolor' => 
    array (
      'functionName' => 'getImageColormapColor',
      'description' => 'Returns the color of the specified colormap index.',
      'methodDescription' => 'Returns the color of the specified colormap index',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagecolormapcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'index',
          'description' => 'The offset into the image colormap.',
        ),
      ),
    ),
    'getimagecolors' => 
    array (
      'functionName' => 'getImageColors',
      'description' => 'Gets the number of unique colors in the image.',
      'methodDescription' => 'Gets the number of unique colors in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagecolors.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecolorspace' => 
    array (
      'functionName' => 'getImageColorspace',
      'description' => 'Gets the image colorspace.',
      'methodDescription' => 'Gets the image colorspace',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagecolorspace.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecompose' => 
    array (
      'functionName' => 'getImageCompose',
      'description' => 'Returns the composite operator associated with the image.',
      'methodDescription' => 'Returns the composite operator associated with the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagecompose.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecompression' => 
    array (
      'functionName' => 'getImageCompression',
      'description' => 'Gets the current image\'s compression type.',
      'methodDescription' => 'Gets the current image\'s compression type',
      'returnType' => 'Returns the compression constant',
      'classname' => 'imagick',
      'method' => 'getimagecompression.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecompressionquality' => 
    array (
      'functionName' => 'getImageCompressionQuality',
      'description' => 'Gets the current image\'s compression quality',
      'methodDescription' => 'Gets the current image\'s compression quality',
      'returnType' => 'Returns integer describing the images compression quality',
      'classname' => 'imagick',
      'method' => 'getimagecompressionquality.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagedelay' => 
    array (
      'functionName' => 'getImageDelay',
      'description' => 'Gets the image delay.',
      'methodDescription' => 'Gets the image delay',
      'returnType' => 'Returns the image delay.',
      'classname' => 'imagick',
      'method' => 'getimagedelay.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagedepth' => 
    array (
      'functionName' => 'getImageDepth',
      'description' => 'Gets the image depth.',
      'methodDescription' => 'Gets the image depth',
      'returnType' => 'The image depth.',
      'classname' => 'imagick',
      'method' => 'getimagedepth.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagedispose' => 
    array (
      'functionName' => 'getImageDispose',
      'description' => 'Gets the image disposal method.',
      'methodDescription' => 'Gets the image disposal method',
      'returnType' => 'Returns the dispose method on success.',
      'classname' => 'imagick',
      'method' => 'getimagedispose.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagedistortion' => 
    array (
      'functionName' => 'getImageDistortion',
      'description' => 'Compares an image to a reconstructed image and returns the specified distortion
   metric.',
      'methodDescription' => 'Compares an image to a reconstructed image',
      'returnType' => 'Returns the distortion metric used on the image (or the best guess
   thereof).',
      'classname' => 'imagick',
      'method' => 'getimagedistortion.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'MagickWand',
          'name' => 'reference',
          'description' => 'Imagick object to compare to.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'metric',
          'description' => 'One of the metric type constants.',
        ),
      ),
    ),
    'getimageextrema' => 
    array (
      'functionName' => 'getImageExtrema',
      'description' => 'Gets the extrema for the image.  Returns an associative array with the keys "min" and "max".',
      'methodDescription' => 'Gets the extrema for the image',
      'returnType' => 'Returns an associative array with the keys "min" and "max".',
      'classname' => 'imagick',
      'method' => 'getimageextrema.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagefilename' => 
    array (
      'functionName' => 'getImageFilename',
      'description' => 'Returns the filename of a particular image in a sequence.',
      'methodDescription' => 'Returns the filename of a particular image in a sequence',
      'returnType' => 'Returns a string with the filename of the image.',
      'classname' => 'imagick',
      'method' => 'getimagefilename.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageformat' => 
    array (
      'functionName' => 'getImageFormat',
      'description' => 'Returns the format of a particular image in a sequence.',
      'methodDescription' => 'Returns the format of a particular image in a sequence',
      'returnType' => 'Returns a string containing the image format on success.',
      'classname' => 'imagick',
      'method' => 'getimageformat.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagegamma' => 
    array (
      'functionName' => 'getImageGamma',
      'description' => 'Gets the image gamma.',
      'methodDescription' => 'Gets the image gamma',
      'returnType' => 'Returns the image gamma on success.',
      'classname' => 'imagick',
      'method' => 'getimagegamma.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagegeometry' => 
    array (
      'functionName' => 'getImageGeometry',
      'description' => 'Returns the width and height as an associative array.',
      'methodDescription' => 'Gets the width and height as an associative array',
      'returnType' => 'Returns an array with the width/height of the image.',
      'classname' => 'imagick',
      'method' => 'getimagegeometry.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagegravity' => 
    array (
      'functionName' => 'getImageGravity',
      'description' => 'Gets the current gravity value of the
   image. Unlike Imagick::getGravity, this method
   returns the gravity defined for the current image sequence.
   Available since 6.4.4',
      'methodDescription' => 'Gets the image gravity',
      'returnType' => 'Returns the images gravity property. Refer to the list of 
   gravity constants.',
      'classname' => 'imagick',
      'method' => 'getimagegravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagegreenprimary' => 
    array (
      'functionName' => 'getImageGreenPrimary',
      'description' => 'Returns the chromaticity green primary point. Returns an array with the keys "x" and "y".',
      'methodDescription' => 'Returns the chromaticy green primary point',
      'returnType' => 'Returns an array with the keys "x" and "y" on success, throws an
   ImagickException on failure.',
      'classname' => 'imagick',
      'method' => 'getimagegreenprimary.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageheight' => 
    array (
      'functionName' => 'getImageHeight',
      'description' => 'Returns the image height.',
      'methodDescription' => 'Returns the image height',
      'returnType' => 'Returns the image height in pixels.',
      'classname' => 'imagick',
      'method' => 'getimageheight.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagehistogram' => 
    array (
      'functionName' => 'getImageHistogram',
      'description' => 'Returns the image histogram as an array of ImagickPixel objects.',
      'methodDescription' => 'Gets the image histogram',
      'returnType' => 'Returns the image histogram as an array of ImagickPixel objects.',
      'classname' => 'imagick',
      'method' => 'getimagehistogram.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageindex' => 
    array (
      'functionName' => 'getImageIndex',
      'description' => 'Returns the index of the current active image within the Imagick object.
   This method has been deprecated. See
   Imagick::getIteratorIndex.',
      'methodDescription' => 'Gets the index of the current active image',
      'returnType' => 'Returns an integer containing the index of the image in the stack.',
      'classname' => 'imagick',
      'method' => 'getimageindex.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageinterlacescheme' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'getimageinterlacescheme.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageinterpolatemethod' => 
    array (
      'functionName' => 'getImageInterpolateMethod',
      'description' => 'Returns the interpolation method for the specified image. The method is one of 
   the Imagick::INTERPOLATE_* constants.',
      'methodDescription' => 'Returns the interpolation method',
      'returnType' => 'Returns the interpolate method on success.',
      'classname' => 'imagick',
      'method' => 'getimageinterpolatemethod.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageiterations' => 
    array (
      'functionName' => 'getImageIterations',
      'description' => 'Gets the image iterations.',
      'methodDescription' => 'Gets the image iterations',
      'returnType' => 'Returns the image iterations as an integer.',
      'classname' => 'imagick',
      'method' => 'getimageiterations.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagelength' => 
    array (
      'functionName' => 'getImageLength',
      'description' => 'Returns the image length in bytes',
      'methodDescription' => 'Returns the image length in bytes',
      'returnType' => 'Returns an int containing the current image size.',
      'classname' => 'imagick',
      'method' => 'getimagelength.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagemagicklicense' => 
    array (
      'functionName' => 'getImageMagickLicense',
      'description' => 'Returns a string containing the ImageMagick license',
      'methodDescription' => 'Returns a string containing the ImageMagick license',
      'returnType' => 'Returns a string containing the ImageMagick license.',
      'classname' => 'imagick',
      'method' => 'getimagemagicklicense.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagematte' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'getimagematte.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagemattecolor' => 
    array (
      'functionName' => 'getImageMatteColor',
      'description' => 'Returns the image matte color.',
      'methodDescription' => 'Returns the image matte color',
      'returnType' => 'Returns ImagickPixel object on success.',
      'classname' => 'imagick',
      'method' => 'getimagemattecolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageorientation' => 
    array (
      'functionName' => 'getImageOrientation',
      'description' => 'Gets the image orientation. The return value is one of the orientation constants.',
      'methodDescription' => 'Gets the image orientation',
      'returnType' => 'Returns an int on success.',
      'classname' => 'imagick',
      'method' => 'getimageorientation.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagepage' => 
    array (
      'functionName' => 'getImagePage',
      'description' => 'Returns the page geometry associated with the image in an array with the
   keys "width", "height", "x", and "y".',
      'methodDescription' => 'Returns the page geometry',
      'returnType' => 'Returns the page geometry associated with the image in an array with the
   keys "width", "height", "x", and "y".',
      'classname' => 'imagick',
      'method' => 'getimagepage.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagepixelcolor' => 
    array (
      'functionName' => 'getImagePixelColor',
      'description' => 'Returns the color of the specified pixel.',
      'methodDescription' => 'Returns the color of the specified pixel',
      'returnType' => 'Returns an ImagickPixel instance for the color at the coordinates given.',
      'classname' => 'imagick',
      'method' => 'getimagepixelcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The x-coordinate of the pixel',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The y-coordinate of the pixel',
        ),
      ),
    ),
    'getimageprofile' => 
    array (
      'functionName' => 'getImageProfile',
      'description' => 'Returns the named image profile.',
      'methodDescription' => 'Returns the named image profile',
      'returnType' => 'Returns a string containing the image profile.',
      'classname' => 'imagick',
      'method' => 'getimageprofile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => 'The name of the profile to return.',
        ),
      ),
    ),
    'getimageprofiles' => 
    array (
      'functionName' => 'getImageProfiles',
      'description' => 'Returns all associated profiles that match the pattern. If True; is passed as second parameter
   only the profile names are returned. Available since 6.3.6',
      'methodDescription' => 'Returns the image profiles',
      'returnType' => 'Returns an array containing the image profiles or profile names.',
      'classname' => 'imagick',
      'method' => 'getimageprofiles.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern',
          'description' => 'The pattern for profile names.',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'only_names',
          'description' => 'Whether to return only profile names. If False; then values are returned as well',
        ),
      ),
    ),
    'getimageproperties' => 
    array (
      'functionName' => 'getImageProperties',
      'description' => 'Returns all associated properties that match the pattern. If True; is passed as second parameter
   only the property names are returned. Available since 6.3.6',
      'methodDescription' => 'Returns the image properties',
      'returnType' => 'Returns an array containing the image properties or property names.',
      'classname' => 'imagick',
      'method' => 'getimageproperties.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern',
          'description' => 'The pattern for property names.',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'only_names',
          'description' => 'Whether to return only property names. If False; then also the values are returned',
        ),
      ),
    ),
    'getimageproperty' => 
    array (
      'functionName' => 'getImageProperty',
      'description' => 'Returns the named image property. Available since 6.3.2',
      'methodDescription' => 'Returns the named image property',
      'returnType' => 'Returns a string containing the image property, false if a 
   property with the given name does not exist.',
      'classname' => 'imagick',
      'method' => 'getimageproperty.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => 'name of the property (for example Exif:DateTime)',
        ),
      ),
    ),
    'getimageredprimary' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'getimageredprimary.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageregion' => 
    array (
      'functionName' => 'getImageRegion',
      'description' => 'Extracts a region of the image and returns it as a new Imagick object.',
      'methodDescription' => 'Extracts a region of the image',
      'returnType' => 'Extracts a region of the image and returns it as a new wand.',
      'classname' => 'imagick',
      'method' => 'getimageregion.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the extracted region.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The height of the extracted region.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X-coordinate of the top-left corner of the extracted region.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y-coordinate of the top-left corner of the extracted region.',
        ),
      ),
    ),
    'getimagerenderingintent' => 
    array (
      'functionName' => 'getImageRenderingIntent',
      'description' => 'Gets the image rendering intent.',
      'methodDescription' => 'Gets the image rendering intent',
      'returnType' => 'Returns the image rendering intent.',
      'classname' => 'imagick',
      'method' => 'getimagerenderingintent.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageresolution' => 
    array (
      'functionName' => 'getImageResolution',
      'description' => 'Gets the image X and Y resolution.',
      'methodDescription' => 'Gets the image X and Y resolution',
      'returnType' => 'Returns the resolution as an array.',
      'classname' => 'imagick',
      'method' => 'getimageresolution.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagesblob' => 
    array (
      'functionName' => 'getImagesBlob',
      'description' => 'Implements direct to memory image formats.  It returns all image
   sequences as a string.  The format of the image determines the
   format of the returned blob (GIF, JPEG, PNG, etc.). To return a
   different image format, use Imagick::setImageFormat().',
      'methodDescription' => 'Returns all image sequences as a blob',
      'returnType' => 'Returns a string containing the images. On failure, throws
   ImagickException.',
      'classname' => 'imagick',
      'method' => 'getimagesblob.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagescene' => 
    array (
      'functionName' => 'getImageScene',
      'description' => 'Gets the image scene.',
      'methodDescription' => 'Gets the image scene',
      'returnType' => 'Returns the image scene.',
      'classname' => 'imagick',
      'method' => 'getimagescene.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagesignature' => 
    array (
      'functionName' => 'getImageSignature',
      'description' => 'Generates an SHA-256 message digest for the image pixel stream.',
      'methodDescription' => 'Generates an SHA-256 message digest',
      'returnType' => 'Returns a string containing the SHA-256 hash of the file.',
      'classname' => 'imagick',
      'method' => 'getimagesignature.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagesize' => 
    array (
      'functionName' => 'getImageSize',
      'description' => 'Returns the image length in bytes.
   Deprecated in favour of Imagick::getImageLength()',
      'methodDescription' => 'Returns the image length in bytes',
      'returnType' => 'Returns an int containing the current image size.',
      'classname' => 'imagick',
      'method' => 'getimagesize.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagetickspersecond' => 
    array (
      'functionName' => 'getImageTicksPerSecond',
      'description' => 'Gets the image ticks-per-second.',
      'methodDescription' => 'Gets the image ticks-per-second',
      'returnType' => 'Returns the image ticks-per-second.',
      'classname' => 'imagick',
      'method' => 'getimagetickspersecond.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagetotalinkdensity' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'getimagetotalinkdensity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagetype' => 
    array (
      'functionName' => 'getImageType',
      'description' => 'Gets the potential image type.',
      'methodDescription' => 'Gets the potential image type',
      'returnType' => 'Returns the potential image type.
   
    
     
      imagick::IMGTYPE_UNDEFINED
     
    
    
     
      imagick::IMGTYPE_BILEVEL
     
    
    
     
      imagick::IMGTYPE_GRAYSCALE
     
    
    
     
      imagick::IMGTYPE_GRAYSCALEMATTE
     
    
    
     
      imagick::IMGTYPE_PALETTE
     
    
    
     
      imagick::IMGTYPE_PALETTEMATTE
     
    
    
     
      imagick::IMGTYPE_TRUECOLOR
     
    
    
     
      imagick::IMGTYPE_TRUECOLORMATTE
     
    
    
     
      imagick::IMGTYPE_COLORSEPARATION
     
    
    
     
      imagick::IMGTYPE_COLORSEPARATIONMATTE
     
    
    
     
      imagick::IMGTYPE_OPTIMIZE',
      'classname' => 'imagick',
      'method' => 'getimagetype.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageunits' => 
    array (
      'functionName' => 'getImageUnits',
      'description' => 'Gets the image units of resolution.',
      'methodDescription' => 'Gets the image units of resolution',
      'returnType' => 'Returns the image units of resolution.',
      'classname' => 'imagick',
      'method' => 'getimageunits.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagevirtualpixelmethod' => 
    array (
      'functionName' => 'getImageVirtualPixelMethod',
      'description' => 'Returns the virtual pixel method for the specified image.',
      'methodDescription' => 'Returns the virtual pixel method',
      'returnType' => 'Returns the virtual pixel method on success.',
      'classname' => 'imagick',
      'method' => 'getimagevirtualpixelmethod.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagewhitepoint' => 
    array (
      'functionName' => 'getImageWhitePoint',
      'description' => 'Returns the chromaticity white point as an associative array with the keys "x" and "y".',
      'methodDescription' => 'Returns the chromaticity white point',
      'returnType' => 'Returns the chromaticity white point as an associative array with the keys
   "x" and "y".',
      'classname' => 'imagick',
      'method' => 'getimagewhitepoint.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagewidth' => 
    array (
      'functionName' => 'getImageWidth',
      'description' => 'Returns the image width.',
      'methodDescription' => 'Returns the image width',
      'returnType' => 'Returns the image width.',
      'classname' => 'imagick',
      'method' => 'getimagewidth.xml',
      'parameters' => 
      array (
      ),
    ),
    'getinterlacescheme' => 
    array (
      'functionName' => 'getInterlaceScheme',
      'description' => 'Gets the object interlace scheme.',
      'methodDescription' => 'Gets the object interlace scheme',
      'returnType' => 'Gets the wand interlace
   scheme.',
      'classname' => 'imagick',
      'method' => 'getinterlacescheme.xml',
      'parameters' => 
      array (
      ),
    ),
    'getiteratorindex' => 
    array (
      'functionName' => 'getIteratorIndex',
      'description' => 'Returns the index of the current active image within the Imagick object.
   Available since 6.2.9',
      'methodDescription' => 'Gets the index of the current active image',
      'returnType' => 'Returns an integer containing the index of the image in the stack.',
      'classname' => 'imagick',
      'method' => 'getiteratorindex.xml',
      'parameters' => 
      array (
      ),
    ),
    'getnumberimages' => 
    array (
      'functionName' => 'getNumberImages',
      'description' => 'Returns the number of images associated with Imagick object.',
      'methodDescription' => 'Returns the number of images in the object',
      'returnType' => 'Returns the number of images associated with Imagick object.',
      'classname' => 'imagick',
      'method' => 'getnumberimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'getoption' => 
    array (
      'functionName' => 'getOption',
      'description' => 'Returns a value associated within the object for the specified key.',
      'methodDescription' => 'Returns a value associated with the specified key',
      'returnType' => 'Returns a value associated with a wand and the specified key.',
      'classname' => 'imagick',
      'method' => 'getoption.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'key',
          'description' => 'The name of the option',
        ),
      ),
    ),
    'getpackagename' => 
    array (
      'functionName' => 'getPackageName',
      'description' => 'Returns the ImageMagick package name.',
      'methodDescription' => 'Returns the ImageMagick package name',
      'returnType' => 'Returns the ImageMagick package name as a string.',
      'classname' => 'imagick',
      'method' => 'getpackagename.xml',
      'parameters' => 
      array (
      ),
    ),
    'getpage' => 
    array (
      'functionName' => 'getPage',
      'description' => 'Returns the page geometry associated with the Imagick object in
   an associative array with the keys "width", "height", "x", and "y".',
      'methodDescription' => 'Returns the page geometry',
      'returnType' => 'Returns the page geometry associated with the Imagick object in
   an associative array with the keys "width", "height", "x", and "y",
   throwing ImagickException on error.',
      'classname' => 'imagick',
      'method' => 'getpage.xml',
      'parameters' => 
      array (
      ),
    ),
    'getpixeliterator' => 
    array (
      'functionName' => 'getPixelIterator',
      'description' => 'Returns a MagickPixelIterator.',
      'methodDescription' => 'Returns a MagickPixelIterator',
      'returnType' => 'Returns an ImagickPixelIterator on success.',
      'classname' => 'imagick',
      'method' => 'getpixeliterator.xml',
      'parameters' => 
      array (
      ),
    ),
    'getpixelregioniterator' => 
    array (
      'functionName' => 'getPixelRegionIterator',
      'description' => 'Get an ImagickPixelIterator for an image section.',
      'methodDescription' => 'Get an ImagickPixelIterator for an image section',
      'returnType' => 'Returns an ImagickPixelIterator for an image section.',
      'classname' => 'imagick',
      'method' => 'getpixelregioniterator.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The x-coordinate of the region.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The y-coordinate of the region.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'The width of the region.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'The height of the region.',
        ),
      ),
    ),
    'getpointsize' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'getpointsize.xml',
      'parameters' => 
      array (
      ),
    ),
    'getquantumdepth' => 
    array (
      'functionName' => 'getQuantumDepth',
      'description' => 'Returns the Imagick quantum depth as a string.',
      'methodDescription' => 'Gets the quantum depth',
      'returnType' => 'Returns the Imagick quantum depth as a string.',
      'classname' => 'imagick',
      'method' => 'getquantumdepth.xml',
      'parameters' => 
      array (
      ),
    ),
    'getquantumrange' => 
    array (
      'functionName' => 'getQuantumRange',
      'description' => 'Returns the quantum range for the Imagick instance.',
      'methodDescription' => 'Returns the Imagick quantum range',
      'returnType' => 'Returns an associative array containing the quantum range as an
   integer ("quantumRangeLong") and as a 
   string ("quantumRangeString").',
      'classname' => 'imagick',
      'method' => 'getquantumrange.xml',
      'parameters' => 
      array (
      ),
    ),
    'getreleasedate' => 
    array (
      'functionName' => 'getReleaseDate',
      'description' => 'Returns the ImageMagick release date as a string.',
      'methodDescription' => 'Returns the ImageMagick release date',
      'returnType' => 'Returns the ImageMagick release date as a string.',
      'classname' => 'imagick',
      'method' => 'getreleasedate.xml',
      'parameters' => 
      array (
      ),
    ),
    'getresource' => 
    array (
      'functionName' => 'getResource',
      'description' => 'Returns the specified resource\'s memory usage in megabytes.',
      'methodDescription' => 'Returns the specified resource\'s memory usage',
      'returnType' => 'Returns the specified resource\'s memory usage in megabytes.',
      'classname' => 'imagick',
      'method' => 'getresource.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'type',
          'description' => 'Refer to the list of resourcetype constants.',
        ),
      ),
    ),
    'getresourcelimit' => 
    array (
      'functionName' => 'getResourceLimit',
      'description' => 'Returns the specified resource limit.',
      'methodDescription' => 'Returns the specified resource limit',
      'returnType' => 'Returns the specified resource limit in megabytes.',
      'classname' => 'imagick',
      'method' => 'getresourcelimit.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'type',
          'description' => 'Refer to the list of resourcetype constants.',
        ),
      ),
    ),
    'getsamplingfactors' => 
    array (
      'functionName' => 'getSamplingFactors',
      'description' => 'Gets the horizontal and vertical sampling factor.',
      'methodDescription' => 'Gets the horizontal and vertical sampling factor',
      'returnType' => 'Returns an associative array with the horizontal and vertical sampling
   factors of the image.',
      'classname' => 'imagick',
      'method' => 'getsamplingfactors.xml',
      'parameters' => 
      array (
      ),
    ),
    'getsize' => 
    array (
      'functionName' => 'getSize',
      'description' => 'Returns the size associated with the Imagick object as an array with the
   keys "columns" and "rows".',
      'methodDescription' => 'Returns the size associated with the Imagick object',
      'returnType' => 'Returns the size associated with the Imagick object as an array with the
   keys "columns" and "rows".',
      'classname' => 'imagick',
      'method' => 'getsize.xml',
      'parameters' => 
      array (
      ),
    ),
    'getsizeoffset' => 
    array (
      'functionName' => 'getSizeOffset',
      'description' => 'Returns the size offset associated with the Imagick object.
   Available since 6.2.9',
      'methodDescription' => 'Returns the size offset',
      'returnType' => 'Returns the size offset associated with the Imagick object.',
      'classname' => 'imagick',
      'method' => 'getsizeoffset.xml',
      'parameters' => 
      array (
      ),
    ),
    'getversion' => 
    array (
      'functionName' => 'getVersion',
      'description' => 'Returns the ImageMagick API version as a string and as a number.',
      'methodDescription' => 'Returns the ImageMagick API version',
      'returnType' => 'Returns the ImageMagick API version as a string and as a number.',
      'classname' => 'imagick',
      'method' => 'getversion.xml',
      'parameters' => 
      array (
      ),
    ),
    'haldclutimage' => 
    array (
      'functionName' => 'haldClutImage',
      'description' => 'Replaces colors in the image using a Hald lookup table. Hald images can be created using 
   HALD color coder.',
      'methodDescription' => 'Replaces colors in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'haldclutimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'clut',
          'description' => 'Imagick object containing the Hald lookup image.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'hasnextimage' => 
    array (
      'functionName' => 'hasNextImage',
      'description' => 'Returns True; if the object has more images when traversing the list in the forward direction.',
      'methodDescription' => 'Checks if the object has more images',
      'returnType' => 'Returns True; if the object has more images when traversing the list in the
   forward direction, returns False; if there are none.',
      'classname' => 'imagick',
      'method' => 'hasnextimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'haspreviousimage' => 
    array (
      'functionName' => 'hasPreviousImage',
      'description' => 'Returns True; if the object has more images when traversing the list in the reverse direction',
      'methodDescription' => 'Checks if the object has a previous image',
      'returnType' => 'Returns True; if the object has more images when traversing the list in the
   reverse direction, returns False; if there are none.',
      'classname' => 'imagick',
      'method' => 'haspreviousimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'identifyimage' => 
    array (
      'functionName' => 'identifyImage',
      'description' => 'Identifies an image and returns the attributes.  Attributes include
   the image width, height, size, and others.',
      'methodDescription' => 'Identifies an image and fetches attributes',
      'returnType' => 'Identifies an image and returns the attributes.  Attributes include
   the image width, height, size, and others.',
      'classname' => 'imagick',
      'method' => 'identifyimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'appendRawOutput',
          'description' => '',
        ),
      ),
    ),
    'implodeimage' => 
    array (
      'functionName' => 'implodeImage',
      'description' => 'Creates a new image that is a copy of an existing one with the image pixels
   "imploded" by the specified percentage.',
      'methodDescription' => 'Creates a new image as a copy',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'implodeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the implode',
        ),
      ),
    ),
    'importimagepixels' => 
    array (
      'functionName' => 'importImagePixels',
      'description' => 'Imports pixels from an array into an image. The map is usually
   \'RGB\'. This method imposes the following constraints for the parameters: amount of pixels
   in the array must match width x height x length of the map.
   Available since 6.4.5',
      'methodDescription' => 'Imports image pixels',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'importimagepixels.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The image x position',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The image y position',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The image width',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The image height',
        ),
        4 => 
        array (
          'type' => 'string',
          'name' => 'map',
          'description' => 'Map of pixel ordering as a string. This can be for example RGB.
       The value can be any combination or order of R = red, G = green, B = blue, A = alpha (0 is transparent), 
       O = opacity (0 is opaque), C = cyan, Y = yellow, M = magenta, K = black, I = intensity (for grayscale), P = pad.',
        ),
        5 => 
        array (
          'type' => 'int',
          'name' => 'storage',
          'description' => 'The pixel storage method. 
       Refer to this list of pixel constants.',
        ),
        6 => 
        array (
          'type' => 'array',
          'name' => 'pixels',
          'description' => 'The array of pixels',
        ),
      ),
    ),
    'labelimage' => 
    array (
      'functionName' => 'labelImage',
      'description' => 'Adds a label to an image.',
      'methodDescription' => 'Adds a label to an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'labelimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'label',
          'description' => 'The label to add',
        ),
      ),
    ),
    'levelimage' => 
    array (
      'functionName' => 'levelImage',
      'description' => 'Adjusts the levels of an image by scaling the colors falling
   between specified white and black points to the full
   available quantum range. The parameters provided represent
   the black, mid, and white points. The black point specifies
   the darkest color in the image. Colors darker than the black
   point are set to zero. Mid point specifies a gamma
   correction to apply to the image.  White point specifies the
   lightest color in the image. Colors brighter than the white
   point are set to the maximum quantum value.',
      'methodDescription' => 'Adjusts the levels of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'levelimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'blackPoint',
          'description' => 'The image black point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'gamma',
          'description' => 'The gamma value',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'whitePoint',
          'description' => 'The image white point',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'linearstretchimage' => 
    array (
      'functionName' => 'linearStretchImage',
      'description' => 'Stretches with saturation the image intensity.',
      'methodDescription' => 'Stretches with saturation the image intensity',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'linearstretchimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'blackPoint',
          'description' => 'The image black point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'whitePoint',
          'description' => 'The image white point',
        ),
      ),
    ),
    'liquidrescaleimage' => 
    array (
      'functionName' => 'liquidRescaleImage',
      'description' => 'This method scales the images using liquid rescaling method. This method
   is an implementation of a technique called seam carving. In order for this
   method to work as expected ImageMagick must be compiled with liblqr support.
   Available since 6.3.9',
      'methodDescription' => 'Animates an image or images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'liquidrescaleimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the target size',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The height of the target size',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'delta_x',
          'description' => 'How much the seam can traverse on x-axis. 
       Passing 0 causes the seams to be straight.',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'rigidity',
          'description' => 'Introduces a bias for non-straight seams. This parameter is 
       typically 0.',
        ),
      ),
    ),
    'magnifyimage' => 
    array (
      'functionName' => 'magnifyImage',
      'description' => 'Is a convenience method that scales an image proportionally to twice its original size.',
      'methodDescription' => 'Scales an image proportionally 2x',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'magnifyimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'mapimage' => 
    array (
      'functionName' => 'mapImage',
      'description' => '',
      'methodDescription' => 'Replaces the colors of an image with the closest color from a reference image.',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'mapimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'map',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'dither',
          'description' => '',
        ),
      ),
    ),
    'mattefloodfillimage' => 
    array (
      'functionName' => 'matteFloodfillImage',
      'description' => 'Changes the transparency value of any pixel that matches
   target and is an immediate neighbor.  If the method
   FillToBorderMethod is specified, the transparency value
   is changed for any neighbor pixel that does not match
   the bordercolor member of image.',
      'methodDescription' => 'Changes the transparency value of a color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'mattefloodfillimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'alpha',
          'description' => 'The level of transparency: 1.0 is fully opaque and 0.0 is fully
       transparent.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The fuzz member of image defines how much tolerance is acceptable to
       consider two colors as the same.',
        ),
        2 => 
        array (
          'type' => 'mixed',
          'name' => 'bordercolor',
          'description' => 'An ImagickPixel object or string representing the border color.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The starting x coordinate of the operation.',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The starting y coordinate of the operation.',
        ),
      ),
    ),
    'medianfilterimage' => 
    array (
      'functionName' => 'medianFilterImage',
      'description' => 'Applies a digital filter that improves the quality of a
   noisy image.  Each pixel is replaced by the median in a
   set of neighboring pixels as defined by radius.',
      'methodDescription' => 'Applies a digital filter',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'medianfilterimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the pixel neighborhood.',
        ),
      ),
    ),
    'mergeimagelayers' => 
    array (
      'functionName' => 'mergeImageLayers',
      'description' => 'Merges image layers into one. This method is useful when working with image
   formats that use multiple layers such as PSD. The merging is controlled using
   the layer_method which defines how the layers are merged.
   Available since 6.3.7',
      'methodDescription' => 'Merges image layers',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'mergeimagelayers.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'layer_method',
          'description' => 'One of the Imagick::LAYERMETHOD_* constants',
        ),
      ),
    ),
    'minifyimage' => 
    array (
      'functionName' => 'minifyImage',
      'description' => 'Is a convenience method that scales an image proportionally to one-half its original size',
      'methodDescription' => 'Scales an image proportionally to half its size',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'minifyimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'modulateimage' => 
    array (
      'functionName' => 'modulateImage',
      'description' => 'Lets you control the brightness, saturation, and hue of an image.  Hue
   is the percentage of absolute rotation from the current position.  For
   example 50 results in a counter-clockwise rotation of 90 degrees, 150
   results in a clockwise rotation of 90 degrees, with 0 and 200 both
   resulting in a rotation of 180 degrees.',
      'methodDescription' => 'Control the brightness, saturation, and hue',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'modulateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'brightness',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'saturation',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'hue',
          'description' => '',
        ),
      ),
    ),
    'montageimage' => 
    array (
      'functionName' => 'montageImage',
      'description' => 'Creates a composite image by combining several separate images.
   The images are tiled on the composite image with the name of the
   image optionally appearing just below the individual tile.',
      'methodDescription' => 'Creates a composite image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'montageimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'draw',
          'description' => 'The font name, size, and color are obtained from this object.',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'tile_geometry',
          'description' => 'The number of tiles per row and page (e.g. 6x4+0+0).',
        ),
        2 => 
        array (
          'type' => 'string',
          'name' => 'thumbnail_geometry',
          'description' => 'Preferred image size and border size of each thumbnail
       (e.g. 120x120+4+3>).',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'mode',
          'description' => 'Thumbnail framing mode, see Montage Mode constants.',
        ),
        4 => 
        array (
          'type' => 'string',
          'name' => 'frame',
          'description' => 'Surround the image with an ornamental border (e.g. 15x15+3+3). The
       frame color is that of the thumbnail\'s matte color.',
        ),
      ),
    ),
    'morphimages' => 
    array (
      'functionName' => 'morphImages',
      'description' => 'Method morphs a set of images.  Both the image pixels and size
   are linearly interpolated to give the appearance of a
   meta-morphosis from one image to the next.',
      'methodDescription' => 'Method morphs a set of images',
      'returnType' => 'This method returns a new Imagick object on success.
  Throws ImagickException;',
      'classname' => 'imagick',
      'method' => 'morphimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'number_frames',
          'description' => 'The number of in-between images to generate.',
        ),
      ),
    ),
    'mosaicimages' => 
    array (
      'functionName' => 'mosaicImages',
      'description' => 'Inlays an image sequence to form a single coherent picture. It
   returns a wand with each image in the sequence composited at
   the location defined by the page offset of the image.',
      'methodDescription' => 'Forms a mosaic from images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'mosaicimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'motionblurimage' => 
    array (
      'functionName' => 'motionBlurImage',
      'description' => 'Simulates motion blur.  We convolve the image with a Gaussian
   operator of the given radius and standard deviation (sigma).
   For reasonable results, radius should be larger than sigma.
   Use a radius of 0 and MotionBlurImage() selects a suitable
   radius for you. Angle gives the angle of the blurring motion.',
      'methodDescription' => 'Simulates motion blur',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'motionblurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => 'Apply the effect along this angle.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.
       The channel argument affects only if Imagick is compiled against ImageMagick version
       6.4.4 or greater.',
        ),
      ),
    ),
    'negateimage' => 
    array (
      'functionName' => 'negateImage',
      'description' => 'Negates the colors in the reference image. The Grayscale
   option means that only grayscale values within the image
   are negated.',
      'methodDescription' => 'Negates the colors in the reference image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'negateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'gray',
          'description' => 'Whether to only negate grayscale pixels within the image.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
      ),
    ),
    'newimage' => 
    array (
      'functionName' => 'newImage',
      'description' => 'Creates a new image and associates ImagickPixel value as background color',
      'methodDescription' => 'Creates a new image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'newimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'cols',
          'description' => 'Columns in the new image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'Rows in the new image',
        ),
        2 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => 'The background color used for this image',
        ),
        3 => 
        array (
          'type' => 'string',
          'name' => 'format',
          'description' => 'Image format. This parameter was added in Imagick version 2.0.1.',
        ),
      ),
    ),
    'newpseudoimage' => 
    array (
      'functionName' => 'newPseudoImage',
      'description' => 'Creates a new image using ImageMagick pseudo-formats.',
      'methodDescription' => 'Creates a new image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'newpseudoimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'columns in the new image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'rows in the new image',
        ),
        2 => 
        array (
          'type' => 'string',
          'name' => 'pseudoString',
          'description' => 'string containing pseudo image definition.',
        ),
      ),
    ),
    'nextimage' => 
    array (
      'functionName' => 'nextImage',
      'description' => 'Associates the next image in the image list with an Imagick object.',
      'methodDescription' => 'Moves to the next image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'nextimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'normalizeimage' => 
    array (
      'functionName' => 'normalizeImage',
      'description' => 'Enhances the contrast of a color image by adjusting the pixels
   color to span the entire range of colors available.',
      'methodDescription' => 'Enhances the contrast of a color image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'normalizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
      ),
    ),
    'oilpaintimage' => 
    array (
      'functionName' => 'oilPaintImage',
      'description' => 'Applies a special effect filter that simulates an oil painting.
   Each pixel is replaced by the most frequent color occurring in
   a circular region defined by radius.',
      'methodDescription' => 'Simulates an oil painting',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'oilpaintimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the circular neighborhood.',
        ),
      ),
    ),
    'opaquepaintimage' => 
    array (
      'functionName' => 'opaquePaintImage',
      'description' => 'Changes any pixel that matches color with the color defined by fill.
   Available since 6.3.8',
      'methodDescription' => 'Changes the color value of any pixel that matches target',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'opaquepaintimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'target',
          'description' => 'ImagickPixel object or a string containing the color to change',
        ),
        1 => 
        array (
          'type' => 'mixed',
          'name' => 'fill',
          'description' => 'The replacement color',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => ';',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'invert',
          'description' => 'If True; paints any pixel that does not match the target color.',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'optimizeimagelayers' => 
    array (
      'functionName' => 'optimizeImageLayers',
      'description' => 'Compares each image the GIF disposed forms of the previous image
   in the sequence.  From this it attempts to select the smallest
   cropped image to replace each frame, while preserving the results
   of the animation. 
   Available since 6.2.9',
      'methodDescription' => 'Removes repeated portions of images to optimize',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'optimizeimagelayers.xml',
      'parameters' => 
      array (
      ),
    ),
    'orderedposterizeimage' => 
    array (
      'functionName' => 'orderedPosterizeImage',
      'description' => 'Performs an ordered dither based on a number of pre-defined dithering threshold maps, 
    but over multiple intensity levels, which can be different for different channels, 
    according to the input arguments. Available since 6.3.1',
      'methodDescription' => 'Performs an ordered dither',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'orderedposterizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'threshold_map',
          'description' => 'A string containing the name of the threshold dither map to use',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
      ),
    ),
    'paintfloodfillimage' => 
    array (
      'functionName' => 'paintFloodfillImage',
      'description' => 'Changes the color value of any pixel that matches target and is an
   immediate neighbor. As of ImageMagick 6.3.8 this method has been deprecated
   and Imagick::floodfillPaintImage should be used instead.',
      'methodDescription' => 'Changes the color value of any pixel that matches target',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'paintfloodfillimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'fill',
          'description' => 'ImagickPixel object or a string containing the fill color',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The amount of fuzz. For example, set fuzz to 10 and the color red at
       intensities of 100 and 102 respectively are now interpreted as the
       same color for the purposes of the floodfill.',
        ),
        2 => 
        array (
          'type' => 'mixed',
          'name' => 'bordercolor',
          'description' => 'ImagickPixel object or a string containing the border color',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X start position of the floodfill',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y start position of the floodfill',
        ),
        5 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'paintopaqueimage' => 
    array (
      'functionName' => 'paintOpaqueImage',
      'description' => 'Changes any pixel that matches color with the color defined by fill.',
      'methodDescription' => 'Change any pixel that matches color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'paintopaqueimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'target',
          'description' => 'Change this target color to the fill color within the image. An
       ImagickPixel object or a string representing the target color.',
        ),
        1 => 
        array (
          'type' => 'mixed',
          'name' => 'fill',
          'description' => 'An ImagickPixel object or a string representing the fill color.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The fuzz member of image defines how much tolerance is acceptable to
       consider two colors as the same.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
      ),
    ),
    'painttransparentimage' => 
    array (
      'functionName' => 'paintTransparentImage',
      'description' => 'Changes any pixel that matches color with the color defined by fill.',
      'methodDescription' => 'Changes any pixel that matches color with the color defined by fill',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'painttransparentimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'target',
          'description' => 'Change this target color to specified opacity value within the image.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'alpha',
          'description' => 'The level of transparency: 1.0 is fully opaque and 0.0 is fully 
       transparent.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The fuzz member of image defines how much tolerance is acceptable to
       consider two colors as the same.',
        ),
      ),
    ),
    'pingimage' => 
    array (
      'functionName' => 'pingImage',
      'description' => 'This method can be used to query image width, height, size, and
   format without reading the whole image in to memory.',
      'methodDescription' => 'Fetch basic attributes about the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'pingimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => 'The filename to read the information from.',
        ),
      ),
    ),
    'pingimageblob' => 
    array (
      'functionName' => 'pingImageBlob',
      'description' => 'This method can be used to query image width, height, size, and
   format without reading the whole image to memory. 
   Available since 6.2.9',
      'methodDescription' => 'Quickly fetch attributes',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'pingimageblob.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'image',
          'description' => 'A string containing the image.',
        ),
      ),
    ),
    'pingimagefile' => 
    array (
      'functionName' => 'pingImageFile',
      'description' => 'This method can be used to query image width, height, size, and
   format without reading the whole image to memory. 
   Available since 6.2.9',
      'methodDescription' => 'Get basic image attributes in a lightweight manner',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'pingimagefile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'resource',
          'name' => 'filehandle',
          'description' => 'An open filehandle to the image.',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'fileName',
          'description' => 'Optional filename for this image.',
        ),
      ),
    ),
    'polaroidimage' => 
    array (
      'functionName' => 'polaroidImage',
      'description' => 'Simulates a Polaroid picture. Available since 6.3.2',
      'methodDescription' => 'Simulates a Polaroid picture',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'polaroidimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'properties',
          'description' => 'The polaroid properties',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => 'The polaroid angle',
        ),
      ),
    ),
    'posterizeimage' => 
    array (
      'functionName' => 'posterizeImage',
      'description' => 'Reduces the image to a limited number of color level.',
      'methodDescription' => 'Reduces the image to a limited number of color level',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'posterizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'levels',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'dither',
          'description' => '',
        ),
      ),
    ),
    'previewimages' => 
    array (
      'functionName' => 'previewImages',
      'description' => 'Tiles 9 thumbnails of the specified image with an image processing
   operation applied at varying strengths.  This is helpful to quickly
   pin-point an appropriate parameter for an image processing operation.',
      'methodDescription' => 'Quickly pin-point appropriate parameters for image processing',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'previewimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'preview',
          'description' => 'Preview type. See Preview type constants',
        ),
      ),
    ),
    'previousimage' => 
    array (
      'functionName' => 'previousImage',
      'description' => 'Assocates the previous image in an image list with the Imagick object.',
      'methodDescription' => 'Move to the previous image in the object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'previousimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'profileimage' => 
    array (
      'functionName' => 'profileImage',
      'description' => 'Adds or removes a ICC, IPTC, or generic profile from an image.
   If the profile is NULL, it is removed from the image otherwise
   added.  Use a name of \'*\' and a profile of NULL to remove all
   profiles from the image.',
      'methodDescription' => 'Adds or removes a profile from an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'profileimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'profile',
          'description' => '',
        ),
      ),
    ),
    'quantizeimage' => 
    array (
      'functionName' => 'quantizeImage',
      'description' => '',
      'methodDescription' => 'Analyzes the colors within a reference image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'quantizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'numberColors',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'colorspace',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'treedepth',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'dither',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'measureError',
          'description' => '',
        ),
      ),
    ),
    'quantizeimages' => 
    array (
      'functionName' => 'quantizeImages',
      'description' => '',
      'methodDescription' => 'Analyzes the colors within a sequence of images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'quantizeimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'numberColors',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'colorspace',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'treedepth',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'dither',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'measureError',
          'description' => '',
        ),
      ),
    ),
    'queryfontmetrics' => 
    array (
      'functionName' => 'queryFontMetrics',
      'description' => 'Returns a multi-dimensional array representing the font metrics.',
      'methodDescription' => 'Returns an array representing the font metrics',
      'returnType' => 'Returns a multi-dimensional array representing the font metrics.',
      'classname' => 'imagick',
      'method' => 'queryfontmetrics.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'properties',
          'description' => 'ImagickDraw object containing font properties',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'text',
          'description' => 'The text',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'multiline',
          'description' => 'Multiline parameter. If left empty it is autodetected',
        ),
      ),
    ),
    'queryfonts' => 
    array (
      'functionName' => 'queryFonts',
      'description' => 'Returns the configured fonts.',
      'methodDescription' => 'Returns the configured fonts',
      'returnType' => 'Returns an array containing the configured fonts.',
      'classname' => 'imagick',
      'method' => 'queryfonts.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern',
          'description' => 'The query pattern',
        ),
      ),
    ),
    'queryformats' => 
    array (
      'functionName' => 'queryFormats',
      'description' => 'Returns formats supported by Imagick.',
      'methodDescription' => 'Returns formats supported by Imagick',
      'returnType' => 'Returns an array containing the formats supported by Imagick.',
      'classname' => 'imagick',
      'method' => 'queryformats.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern',
          'description' => '',
        ),
      ),
    ),
    'radialblurimage' => 
    array (
      'functionName' => 'radialBlurImage',
      'description' => 'Radial blurs an image.',
      'methodDescription' => 'Radial blurs an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'radialblurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'raiseimage' => 
    array (
      'functionName' => 'raiseImage',
      'description' => 'Creates a simulated three-dimensional button-like effect
   by lightening and darkening the edges of the image.
   Members width and height of raise_info define the width
   of the vertical and horizontal edge of the effect.',
      'methodDescription' => 'Creates a simulated 3d button-like effect',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'raiseimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'raise',
          'description' => '',
        ),
      ),
    ),
    'randomthresholdimage' => 
    array (
      'functionName' => 'randomThresholdImage',
      'description' => 'Changes the value of individual pixels based on the
   intensity of each pixel compared to threshold. The
   result is a high-contrast, two color image. Available since 6.2.9',
      'methodDescription' => 'Creates a high-contrast, two-color image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'randomthresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'low',
          'description' => 'The low point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'high',
          'description' => 'The high point',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'readimage' => 
    array (
      'functionName' => 'readImage',
      'description' => 'Reads image from filename',
      'methodDescription' => 'Reads image from filename',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'readimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => '',
        ),
      ),
    ),
    'readimageblob' => 
    array (
      'functionName' => 'readImageBlob',
      'description' => 'Reads image from a binary string',
      'methodDescription' => 'Reads image from a binary string',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'readimageblob.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'image',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => '',
        ),
      ),
    ),
    'readimagefile' => 
    array (
      'functionName' => 'readImageFile',
      'description' => 'Reads image from open filehandle',
      'methodDescription' => 'Reads image from open filehandle',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'readimagefile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'resource',
          'name' => 'filehandle',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'fileName',
          'description' => '',
        ),
      ),
    ),
    'recolorimage' => 
    array (
      'functionName' => 'recolorImage',
      'description' => 'Translate, scale, shear, or rotate image colors. This method supports variable sized matrices but normally
   5x5 matrix is used for RGBA and 6x6 is used for CMYK. The last row should contain the normalized values.
   Available since 6.3.6',
      'methodDescription' => 'Recolors image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'recolorimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'matrix',
          'description' => 'The matrix containing the color values',
        ),
      ),
    ),
    'reducenoiseimage' => 
    array (
      'functionName' => 'reduceNoiseImage',
      'description' => 'Smooths the contours of an image while still preserving edge
   information. The algorithm works by replacing each pixel with
   its neighbor closest in value. A neighbor is defined by radius.
   Use a radius of 0 and Imagick::reduceNoiseImage() selects a
   suitable radius for you.',
      'methodDescription' => 'Smooths the contours of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'reducenoiseimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => '',
        ),
      ),
    ),
    'remapimage' => 
    array (
      'functionName' => 'remapImage',
      'description' => 'Replaces colors an image with those defined by replacement. The colors
   are replaced with the closest possible color. Available since 6.4.5',
      'methodDescription' => 'Remaps image colors',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'remapimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'replacement',
          'description' => 'An Imagick object containing the replacement colors',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'DITHER',
          'description' => 'Refer to this list of dither method constants',
        ),
      ),
    ),
    'removeimage' => 
    array (
      'functionName' => 'removeImage',
      'description' => 'Removes an image from the image list.',
      'methodDescription' => 'Removes an image from the image list',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'removeimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'removeimageprofile' => 
    array (
      'functionName' => 'removeImageProfile',
      'description' => 'Removes the named image profile and returns it.',
      'methodDescription' => 'Removes the named image profile and returns it',
      'returnType' => 'Returns a string containing the profile of the image.',
      'classname' => 'imagick',
      'method' => 'removeimageprofile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => '',
        ),
      ),
    ),
    'render' => 
    array (
      'functionName' => 'render',
      'description' => 'Renders all preceding drawing commands.',
      'methodDescription' => 'Renders all preceding drawing commands',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'render.xml',
      'parameters' => 
      array (
      ),
    ),
    'resampleimage' => 
    array (
      'functionName' => 'resampleImage',
      'description' => 'Resample image to desired resolution.',
      'methodDescription' => 'Resample image to desired resolution',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'resampleimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x_resolution',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y_resolution',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'filter',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'blur',
          'description' => '',
        ),
      ),
    ),
    'resetimagepage' => 
    array (
      'functionName' => 'resetImagePage',
      'description' => 'The page definition as a string. The string is in format WxH+x+y.
   Available since 6.3.6',
      'methodDescription' => 'Reset image page',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'resetimagepage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'page',
          'description' => 'The page definition. For example 7168x5147+0+0',
        ),
      ),
    ),
    'resizeimage' => 
    array (
      'functionName' => 'resizeImage',
      'description' => 'Scales an image to the desired dimensions with a
   filter.',
      'methodDescription' => 'Scales an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'resizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'Width of the image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'Height of the image',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'filter',
          'description' => 'Refer to the list of filter constants.',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'blur',
          'description' => 'The blur factor where > 1 is blurry, < 1 is sharp.',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => 'Optional fit parameter.',
        ),
      ),
    ),
    'rollimage' => 
    array (
      'functionName' => 'rollImage',
      'description' => 'Offsets an image as defined by x and y.',
      'methodDescription' => 'Offsets an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'rollimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The X offset.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The Y offset.',
        ),
      ),
    ),
    'rotateimage' => 
    array (
      'functionName' => 'rotateImage',
      'description' => 'Rotates an image the specified number of degrees. Empty
   triangles left over from rotating the image are filled
   with the background color.',
      'methodDescription' => 'Rotates an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'rotateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => 'The background color',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => 'Rotation angle, in degrees. The rotation angle is interpreted as the
       number of degrees to rotate the image clockwise.',
        ),
      ),
    ),
    'roundcorners' => 
    array (
      'functionName' => 'roundCorners',
      'description' => 'Rounds image corners. The first two parameters control the amount 
   of rounding and the three last parameters can be used to fine-tune 
   the rounding process. Available since 6.2.9',
      'methodDescription' => 'Rounds image corners',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'roundcorners.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x_rounding',
          'description' => 'x rounding',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y_rounding',
          'description' => 'y rounding',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'stroke_width',
          'description' => 'stroke width',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'displace',
          'description' => 'image displace',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'size_correction',
          'description' => 'size correction',
        ),
      ),
    ),
    'sampleimage' => 
    array (
      'functionName' => 'sampleImage',
      'description' => 'Scales an image to the desired dimensions with pixel sampling.
   Unlike other scaling methods, this method does not introduce
   any additional color into the scaled image.',
      'methodDescription' => 'Scales an image with pixel sampling',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sampleimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'scaleimage' => 
    array (
      'functionName' => 'scaleImage',
      'description' => 'Scales the size of an image to the given dimensions. The other parameter
   will be calculated if 0 is passed as either param.',
      'methodDescription' => 'Scales the size of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'scaleimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'cols',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => '',
        ),
      ),
    ),
    'segmentimage' => 
    array (
      'functionName' => 'segmentImage',
      'description' => 'Analyses the image and identifies units that are similar. Available since 6.4.5',
      'methodDescription' => 'Segments an image',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'segmentimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'COLORSPACE',
          'description' => 'One of the COLORSPACE constants.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'cluster_threshold',
          'description' => 'A percentage describing minimum number of pixels 
       contained in hexedra before it is considered valid.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'smooth_threshold',
          'description' => 'Eliminates noise from the histogram.',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'verbose',
          'description' => 'Whether to output detailed information about recognised classes.',
        ),
      ),
    ),
    'separateimagechannel' => 
    array (
      'functionName' => 'separateImageChannel',
      'description' => 'Separates a channel from the image and returns a grayscale image. A channel
   is a particular color component of each pixel in the image.',
      'methodDescription' => 'Separates a channel from the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'separateimagechannel.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'sepiatoneimage' => 
    array (
      'functionName' => 'sepiaToneImage',
      'description' => 'Applies a special effect to the image, similar to the effect achieved
   in a photo darkroom by sepia toning.  Threshold ranges from 0 to
   QuantumRange and is a measure of the extent of the sepia toning. A
   threshold of 80 is a good starting point for a reasonable tone.',
      'methodDescription' => 'Sepia tones an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sepiatoneimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'threshold',
          'description' => '',
        ),
      ),
    ),
    'setbackgroundcolor' => 
    array (
      'functionName' => 'setBackgroundColor',
      'description' => 'Sets the object\'s default background color.',
      'methodDescription' => 'Sets the object\'s default background color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setbackgroundcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => '',
        ),
      ),
    ),
    'setcolorspace' => 
    array (
      'functionName' => 'setColorspace',
      'description' => 'Sets the global colorspace value for the object.
   Available since 6.5.7',
      'methodDescription' => 'Set colorspace',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setcolorspace.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'COLORSPACE',
          'description' => 'One of the COLORSPACE constants',
        ),
      ),
    ),
    'setcompression' => 
    array (
      'functionName' => 'setCompression',
      'description' => 'Sets the object\'s default compression type',
      'methodDescription' => 'Sets the object\'s default compression type',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setcompression.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'compression',
          'description' => '',
        ),
      ),
    ),
    'setcompressionquality' => 
    array (
      'functionName' => 'setCompressionQuality',
      'description' => 'Sets the object\'s default compression quality.',
      'methodDescription' => 'Sets the object\'s default compression quality',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setcompressionquality.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'quality',
          'description' => '',
        ),
      ),
    ),
    'setfilename' => 
    array (
      'functionName' => 'setFilename',
      'description' => 'Sets the filename before you read or write an image file.',
      'methodDescription' => 'Sets the filename before you read or write the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setfilename.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => '',
        ),
      ),
    ),
    'setfirstiterator' => 
    array (
      'functionName' => 'setFirstIterator',
      'description' => 'Sets the Imagick iterator to the first image.',
      'methodDescription' => 'Sets the Imagick iterator to the first image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setfirstiterator.xml',
      'parameters' => 
      array (
      ),
    ),
    'setfont' => 
    array (
      'functionName' => 'setFont',
      'description' => 'Sets object\'s font property. This method can be used for example to set font for 
   caption: pseudo-format. The font needs to be configured in ImageMagick configuration
   or a file by the name of font must exist. This method should
   not be confused with ImagickDraw::setFont which sets the font
   for a specific ImagickDraw object.
   Available since 6.3.7',
      'methodDescription' => 'Sets font',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setfont.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'font',
          'description' => 'Font name or a filename',
        ),
      ),
    ),
    'setformat' => 
    array (
      'functionName' => 'setFormat',
      'description' => 'Sets the format of the Imagick object.',
      'methodDescription' => 'Sets the format of the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setformat.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'format',
          'description' => '',
        ),
      ),
    ),
    'setgravity' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'setgravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'setimage' => 
    array (
      'functionName' => 'setImage',
      'description' => 'Replaces the current image sequence with the image from replace object.',
      'methodDescription' => 'Replaces image in the object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'replace',
          'description' => 'The replace Imagick object',
        ),
      ),
    ),
    'setimagealphachannel' => 
    array (
      'functionName' => 'setImageAlphaChannel',
      'description' => 'Activate or deactivate image alpha channel. The mode 
   is one of the Imagick::ALPHACHANNEL_* constants.
   Available since 6.3.8',
      'methodDescription' => 'Sets image alpha channel',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagealphachannel.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'mode',
          'description' => 'One of the Imagick::ALPHACHANNEL_* constants',
        ),
      ),
    ),
    'setimageartifact' => 
    array (
      'functionName' => 'setImageArtifact',
      'description' => 'Associates an artifact with the image. The difference between image properties and 
   image artifacts is that properties are public and artifacts are private.
   Available since 6.5.7',
      'methodDescription' => 'Set image artifact',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageartifact.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'artifact',
          'description' => 'The name of the artifact',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'value',
          'description' => 'The value of the artifact',
        ),
      ),
    ),
    'setimagebackgroundcolor' => 
    array (
      'functionName' => 'setImageBackgroundColor',
      'description' => 'Sets the image background color.',
      'methodDescription' => 'Sets the image background color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagebackgroundcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => '',
        ),
      ),
    ),
    'setimagebias' => 
    array (
      'functionName' => 'setImageBias',
      'description' => 'Sets the image bias for any method that convolves an image (e.g. Imagick::ConvolveImage()).',
      'methodDescription' => 'Sets the image bias for any method that convolves an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagebias.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'bias',
          'description' => '',
        ),
      ),
    ),
    'setimageblueprimary' => 
    array (
      'functionName' => 'setImageBluePrimary',
      'description' => 'Sets the image chromaticity blue primary point.',
      'methodDescription' => 'Sets the image chromaticity blue primary point',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageblueprimary.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setimagebordercolor' => 
    array (
      'functionName' => 'setImageBorderColor',
      'description' => 'Sets the image border color.',
      'methodDescription' => 'Sets the image border color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagebordercolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'border',
          'description' => 'The border color',
        ),
      ),
    ),
    'setimagechanneldepth' => 
    array (
      'functionName' => 'setImageChannelDepth',
      'description' => 'Sets the depth of a particular image channel.',
      'methodDescription' => 'Sets the depth of a particular image channel',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagechanneldepth.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'depth',
          'description' => '',
        ),
      ),
    ),
    'setimageclipmask' => 
    array (
      'functionName' => 'setImageClipMask',
      'description' => 'Sets image clip mask from another Imagick object.
   Available since 6.3.6',
      'methodDescription' => 'Sets image clip mask',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageclipmask.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'clip_mask',
          'description' => 'The Imagick object containing the clip mask',
        ),
      ),
    ),
    'setimagecolormapcolor' => 
    array (
      'functionName' => 'setImageColormapColor',
      'description' => 'Sets the color of the specified colormap index.',
      'methodDescription' => 'Sets the color of the specified colormap index',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecolormapcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'index',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'color',
          'description' => '',
        ),
      ),
    ),
    'setimagecolorspace' => 
    array (
      'functionName' => 'setImageColorspace',
      'description' => 'Sets the image colorspace.',
      'methodDescription' => 'Sets the image colorspace',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecolorspace.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'colorspace',
          'description' => 'One of the COLORSPACE constants',
        ),
      ),
    ),
    'setimagecompose' => 
    array (
      'functionName' => 'setImageCompose',
      'description' => 'Sets the image composite operator, useful for specifying how
   to composite the image thumbnail when using the
   Imagick::montageImage() method.',
      'methodDescription' => 'Sets the image composite operator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecompose.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'compose',
          'description' => '',
        ),
      ),
    ),
    'setimagecompression' => 
    array (
      'functionName' => 'setImageCompression',
      'description' => '',
      'methodDescription' => 'Sets the image compression',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecompression.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'compression',
          'description' => 'One of the COMPRESSION constants',
        ),
      ),
    ),
    'setimagecompressionquality' => 
    array (
      'functionName' => 'setImageCompressionQuality',
      'description' => 'Sets the image compression quality.',
      'methodDescription' => 'Sets the image compression quality',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecompressionquality.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'quality',
          'description' => 'The image compression quality as an integer',
        ),
      ),
    ),
    'setimagedelay' => 
    array (
      'functionName' => 'setImageDelay',
      'description' => 'The delay can be set individually for each frame in an image.',
      'methodDescription' => 'Sets the image delay',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagedelay.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'delay',
          'description' => 'The amount of time expressed in \'ticks\' that the image should be
       displayed for. For animated GIFs there are 100 ticks per second, so a
       value of 20 would be 20/100 of a second aka 1/5th of a second.',
        ),
      ),
    ),
    'setimagedepth' => 
    array (
      'functionName' => 'setImageDepth',
      'description' => 'Sets the image depth.',
      'methodDescription' => 'Sets the image depth',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagedepth.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'depth',
          'description' => '',
        ),
      ),
    ),
    'setimagedispose' => 
    array (
      'functionName' => 'setImageDispose',
      'description' => 'Sets the image disposal method.',
      'methodDescription' => 'Sets the image disposal method',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagedispose.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'dispose',
          'description' => '',
        ),
      ),
    ),
    'setimageextent' => 
    array (
      'functionName' => 'setImageExtent',
      'description' => 'Sets the image size (i.e. columns & rows).',
      'methodDescription' => 'Sets the image size',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageextent.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'setimagefilename' => 
    array (
      'functionName' => 'setImageFilename',
      'description' => 'Sets the filename of a particular image in a sequence.',
      'methodDescription' => 'Sets the filename of a particular image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagefilename.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => '',
        ),
      ),
    ),
    'setimageformat' => 
    array (
      'functionName' => 'setImageFormat',
      'description' => 'Sets the format of a particular image in a sequence.',
      'methodDescription' => 'Sets the format of a particular image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageformat.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'format',
          'description' => 'String presentation of the image format. Format support
       depends on the ImageMagick installation.',
        ),
      ),
    ),
    'setimagegamma' => 
    array (
      'functionName' => 'setImageGamma',
      'description' => 'Sets the image gamma.',
      'methodDescription' => 'Sets the image gamma',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagegamma.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'gamma',
          'description' => '',
        ),
      ),
    ),
    'setimagegravity' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'setimagegravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'setimagegreenprimary' => 
    array (
      'functionName' => 'setImageGreenPrimary',
      'description' => 'Sets the image chromaticity green primary point.',
      'methodDescription' => 'Sets the image chromaticity green primary point',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagegreenprimary.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setimageindex' => 
    array (
      'functionName' => 'setImageIndex',
      'description' => 'This method has been deprecated. See
   Imagick::setIteratorIndex.',
      'methodDescription' => 'Set the iterator position',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageindex.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'index',
          'description' => 'The position to set the iterator to',
        ),
      ),
    ),
    'setimageinterlacescheme' => 
    array (
      'functionName' => 'setImageInterlaceScheme',
      'description' => 'Sets the image compression.',
      'methodDescription' => 'Sets the image compression',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageinterlacescheme.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'interlace_scheme',
          'description' => '',
        ),
      ),
    ),
    'setimageinterpolatemethod' => 
    array (
      'functionName' => 'setImageInterpolateMethod',
      'description' => 'Sets the image interpolate pixel method.',
      'methodDescription' => 'Sets the image interpolate pixel method',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageinterpolatemethod.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'method',
          'description' => 'The method is one of the Imagick::INTERPOLATE_* constants',
        ),
      ),
    ),
    'setimageiterations' => 
    array (
      'functionName' => 'setImageIterations',
      'description' => 'Sets the number of iterations an animated image is repeated.',
      'methodDescription' => 'Sets the image iterations',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageiterations.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'iterations',
          'description' => 'The number of iterations the image should loop over. Set to \'0\' to loop
       continuously.',
        ),
      ),
    ),
    'setimagematte' => 
    array (
      'functionName' => 'setImageMatte',
      'description' => 'Sets the image matte channel. 
   Available since 6.2.9',
      'methodDescription' => 'Sets the image matte channel',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagematte.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'matte',
          'description' => 'True activates the matte channel and false disables it.',
        ),
      ),
    ),
    'setimagemattecolor' => 
    array (
      'functionName' => 'setImageMatteColor',
      'description' => 'Sets the image matte color.',
      'methodDescription' => 'Sets the image matte color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagemattecolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'matte',
          'description' => '',
        ),
      ),
    ),
    'setimageopacity' => 
    array (
      'functionName' => 'setImageOpacity',
      'description' => 'Sets the image to the specified opacity level. Available since 6.3.1
   This method operates on all channels, which means that for example opacity value
   of 0.5 will set all transparent areas to partially opaque. To add transparency to
   areas that are not already transparent use Imagick::evaluateImage()',
      'methodDescription' => 'Sets the image opacity level',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageopacity.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'opacity',
          'description' => 'The level of transparency: 1.0 is fully opaque and 0.0 is fully
       transparent.',
        ),
      ),
    ),
    'setimageorientation' => 
    array (
      'functionName' => 'setImageOrientation',
      'description' => 'Sets the image orientation.',
      'methodDescription' => 'Sets the image orientation',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageorientation.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'orientation',
          'description' => 'One of the orientation constants',
        ),
      ),
    ),
    'setimagepage' => 
    array (
      'functionName' => 'setImagePage',
      'description' => 'Sets the page geometry of the image.',
      'methodDescription' => 'Sets the page geometry of the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagepage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setimageprofile' => 
    array (
      'functionName' => 'setImageProfile',
      'description' => 'Adds a named profile to the Imagick object.  If a profile
   with the same name already exists, it is replaced. This
   method differs from the Imagick::ProfileImage() method in
   that it does not apply any CMS color profiles.',
      'methodDescription' => 'Adds a named profile to the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageprofile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'profile',
          'description' => '',
        ),
      ),
    ),
    'setimageproperty' => 
    array (
      'functionName' => 'setImageProperty',
      'description' => 'Sets a named property to the image. Available since 6.3.2',
      'methodDescription' => 'Sets an image property',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageproperty.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'value',
          'description' => '',
        ),
      ),
    ),
    'setimageredprimary' => 
    array (
      'functionName' => 'setImageRedPrimary',
      'description' => 'Sets the image chromaticity red primary point.',
      'methodDescription' => 'Sets the image chromaticity red primary point',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageredprimary.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setimagerenderingintent' => 
    array (
      'functionName' => 'setImageRenderingIntent',
      'description' => 'Sets the image rendering intent.',
      'methodDescription' => 'Sets the image rendering intent',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagerenderingintent.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'rendering_intent',
          'description' => '',
        ),
      ),
    ),
    'setimageresolution' => 
    array (
      'functionName' => 'setImageResolution',
      'description' => 'Sets the image resolution.',
      'methodDescription' => 'Sets the image resolution',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageresolution.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x_resolution',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y_resolution',
          'description' => '',
        ),
      ),
    ),
    'setimagescene' => 
    array (
      'functionName' => 'setImageScene',
      'description' => 'Sets the image scene.',
      'methodDescription' => 'Sets the image scene',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagescene.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'scene',
          'description' => '',
        ),
      ),
    ),
    'setimagetickspersecond' => 
    array (
      'functionName' => 'setImageTicksPerSecond',
      'description' => 'Adjust the amount of time that a frame of an animated image is displayed for.',
      'methodDescription' => 'Sets the image ticks-per-second',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagetickspersecond.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'ticks_per_second',
          'description' => 'The duration for which an image should be displayed expressed in ticks
       per second.',
        ),
      ),
    ),
    'setimagetype' => 
    array (
      'functionName' => 'setImageType',
      'description' => 'Sets the image type.',
      'methodDescription' => 'Sets the image type',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagetype.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'image_type',
          'description' => '',
        ),
      ),
    ),
    'setimageunits' => 
    array (
      'functionName' => 'setImageUnits',
      'description' => 'Sets the image units of resolution.',
      'methodDescription' => 'Sets the image units of resolution',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageunits.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'units',
          'description' => '',
        ),
      ),
    ),
    'setimagevirtualpixelmethod' => 
    array (
      'functionName' => 'setImageVirtualPixelMethod',
      'description' => 'Sets the image virtual pixel method.',
      'methodDescription' => 'Sets the image virtual pixel method',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagevirtualpixelmethod.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'method',
          'description' => '',
        ),
      ),
    ),
    'setimagewhitepoint' => 
    array (
      'functionName' => 'setImageWhitePoint',
      'description' => 'Sets the image chromaticity white point.',
      'methodDescription' => 'Sets the image chromaticity white point',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagewhitepoint.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setinterlacescheme' => 
    array (
      'functionName' => 'setInterlaceScheme',
      'description' => 'Sets the image compression.',
      'methodDescription' => 'Sets the image compression',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setinterlacescheme.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'interlace_scheme',
          'description' => '',
        ),
      ),
    ),
    'setiteratorindex' => 
    array (
      'functionName' => 'setIteratorIndex',
      'description' => 'Set the iterator to the position in the image list specified with the index parameter.
  Available since 6.2.9',
      'methodDescription' => 'Set the iterator position',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setiteratorindex.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'index',
          'description' => 'The position to set the iterator to',
        ),
      ),
    ),
    'setlastiterator' => 
    array (
      'functionName' => 'setLastIterator',
      'description' => 'Sets the Imagick iterator to the last image.',
      'methodDescription' => 'Sets the Imagick iterator to the last image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setlastiterator.xml',
      'parameters' => 
      array (
      ),
    ),
    'setoption' => 
    array (
      'functionName' => 'setOption',
      'description' => 'Associates one or more options with the wand.',
      'methodDescription' => 'Set an option',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setoption.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'key',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'value',
          'description' => '',
        ),
      ),
    ),
    'setpage' => 
    array (
      'functionName' => 'setPage',
      'description' => 'Sets the page geometry of the Imagick object.',
      'methodDescription' => 'Sets the page geometry of the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setpage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setpointsize' => 
    array (
      'functionName' => 'setPointSize',
      'description' => 'Sets object\'s point size property. This method can be used for example to set font size for 
   caption: pseudo-format.
   Available since 6.3.7',
      'methodDescription' => 'Sets point size',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setpointsize.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'point_size',
          'description' => 'Point size',
        ),
      ),
    ),
    'setresolution' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'setresolution.xml',
      'parameters' => 
      array (
      ),
    ),
    'setresourcelimit' => 
    array (
      'functionName' => 'setResourceLimit',
      'description' => 'This method is used to modify the resource limits of the underlying ImageMagick
   library.',
      'methodDescription' => 'Sets the limit for a particular resource in megabytes',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setresourcelimit.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'type',
          'description' => 'Refer to the list of resourcetype constants.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'limit',
          'description' => 'The resource limit. The unit depends on the type of the resource being limited.',
        ),
      ),
    ),
    'setsamplingfactors' => 
    array (
      'functionName' => 'setSamplingFactors',
      'description' => 'Sets the image sampling factors.',
      'methodDescription' => 'Sets the image sampling factors',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setsamplingfactors.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'factors',
          'description' => '',
        ),
      ),
    ),
    'setsize' => 
    array (
      'functionName' => 'setSize',
      'description' => 'Sets the size of the Imagick object. Set it before you read a raw image
   format such as RGB, GRAY, or CMYK.',
      'methodDescription' => 'Sets the size of the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setsize.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'setsizeoffset' => 
    array (
      'functionName' => 'setSizeOffset',
      'description' => 'Sets the size and offset of the Imagick object. Set it before you read a
   raw image format such as RGB, GRAY, or CMYK.
   Available since 6.2.9',
      'methodDescription' => 'Sets the size and offset of the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setsizeoffset.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'The width in pixels.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'The height in pixels.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'offset',
          'description' => 'The image offset.',
        ),
      ),
    ),
    'settype' => 
    array (
      'functionName' => 'setType',
      'description' => 'Sets the image type attribute.',
      'methodDescription' => 'Sets the image type attribute',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'settype.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'image_type',
          'description' => '',
        ),
      ),
    ),
    'shadeimage' => 
    array (
      'functionName' => 'shadeImage',
      'description' => 'Shines a distant light on an image to create a three-dimensional effect.
   You control the positioning of the light with azimuth and elevation;
   azimuth is measured in degrees off the x axis and elevation is measured
   in pixels above the Z axis.
   Available since 6.2.9',
      'methodDescription' => 'Creates a 3D effect',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'shadeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'gray',
          'description' => 'A value other than zero shades the intensity of each pixel.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'azimuth',
          'description' => 'Defines the light source direction.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'elevation',
          'description' => 'Defines the light source direction.',
        ),
      ),
    ),
    'shadowimage' => 
    array (
      'functionName' => 'shadowImage',
      'description' => 'Simulates an image shadow.',
      'methodDescription' => 'Simulates an image shadow',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'shadowimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'opacity',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'sharpenimage' => 
    array (
      'functionName' => 'sharpenImage',
      'description' => 'Sharpens an image. We convolve the image with a Gaussian operator
   of the given radius and standard deviation (sigma). For reasonable
   results, the radius should be larger than sigma. Use a radius of
   0 and Imagick::sharpenImage selects a suitable radius
   for you.',
      'methodDescription' => 'Sharpens an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sharpenimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'shaveimage' => 
    array (
      'functionName' => 'shaveImage',
      'description' => 'Shaves pixels from the image edges. It allocates the memory necessary for
   the new Image structure and returns a pointer to the new image.',
      'methodDescription' => 'Shaves pixels from the image edges',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'shaveimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'shearimage' => 
    array (
      'functionName' => 'shearImage',
      'description' => 'Slides one edge of an image along the X or Y axis, creating a parallelogram.
   An X direction shear slides an edge along the X axis, while a Y direction
   shear slides an edge along the Y axis.  The amount of the shear is controlled
   by a shear angle.  For X direction shears, x_shear is measured relative to
   the Y axis, and similarly, for Y direction shears y_shear is measured
   relative to the X axis.  Empty triangles left over from shearing the image
   are filled with the background color.',
      'methodDescription' => 'Creating a parallelogram',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'shearimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => 'The background color',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'x_shear',
          'description' => 'The number of degrees to shear on the x axis',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'y_shear',
          'description' => 'The number of degrees to shear on the y axis',
        ),
      ),
    ),
    'sigmoidalcontrastimage' => 
    array (
      'functionName' => 'sigmoidalContrastImage',
      'description' => 'See also ImageMagick
   v6 Examples - Image Transformations — Sigmoidal Non-linearity Contrast',
      'methodDescription' => 'Adjusts the contrast of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sigmoidalcontrastimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'sharpen',
          'description' => 'If true increase the contrast, if false decrease the contrast.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'alpha',
          'description' => 'The amount of contrast to apply. 1 is very little, 5 is a significant amount, 20 is extreme.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'beta',
          'description' => 'Where the midpoint of the gradient will be. This value should be in the range 0 to 1 - mutliplied by the quantum value for ImageMagick.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Which color channels the contrast will be applied to.',
        ),
      ),
    ),
    'sketchimage' => 
    array (
      'functionName' => 'sketchImage',
      'description' => 'Simulates a pencil sketch. We convolve the image with a Gaussian operator
   of the given radius and standard deviation (sigma). For reasonable
   results, radius should be larger than sigma.  Use a radius of 0 and
   Imagick::sketchImage() selects a suitable radius for you. Angle gives the
   angle of the blurring motion. 
   Available since 6.2.9',
      'methodDescription' => 'Simulates a pencil sketch',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sketchimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => 'Apply the effect along this angle.',
        ),
      ),
    ),
    'solarizeimage' => 
    array (
      'functionName' => 'solarizeImage',
      'description' => 'Applies a special effect to the image, similar to the effect achieved in
   a photo darkroom by selectively exposing areas of photo sensitive paper
   to light. Threshold ranges from 0 to QuantumRange and is a measure of the
   extent of the solarization.',
      'methodDescription' => 'Applies a solarizing effect to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'solarizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'threshold',
          'description' => '',
        ),
      ),
    ),
    'sparsecolorimage' => 
    array (
      'functionName' => 'sparseColorImage',
      'description' => 'Given the arguments array containing numeric values this method interpolates
   the colors found at those coordinates across the whole image using sparse_method.
   Available since 6.4.5',
      'methodDescription' => 'Interpolates colors',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sparsecolorimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'SPARSE_METHOD',
          'description' => 'Refer to this list of sparse method constants',
        ),
        1 => 
        array (
          'type' => 'array',
          'name' => 'arguments',
          'description' => 'An array containing the coordinates. 
       The array is in format array(1,1, 2,45)',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'spliceimage' => 
    array (
      'functionName' => 'spliceImage',
      'description' => 'Splices a solid color into the image.',
      'methodDescription' => 'Splices a solid color into the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'spliceimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'spreadimage' => 
    array (
      'functionName' => 'spreadImage',
      'description' => 'Special effects method that randomly displaces each pixel in a block
   defined by the radius parameter.',
      'methodDescription' => 'Randomly displaces each pixel in a block',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'spreadimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => '',
        ),
      ),
    ),
    'steganoimage' => 
    array (
      'functionName' => 'steganoImage',
      'description' => 'Hides a digital watermark within the image. Recover the hidden watermark
   later to prove that the authenticity of an image. Offset defines the start
   position within the image to hide the watermark.',
      'methodDescription' => 'Hides a digital watermark within the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'steganoimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'watermark_wand',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'offset',
          'description' => '',
        ),
      ),
    ),
    'stereoimage' => 
    array (
      'functionName' => 'stereoImage',
      'description' => 'Composites two images and produces a single image that is the composite
   of a left and right image of a stereo pair.',
      'methodDescription' => 'Composites two images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'stereoimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'offset_wand',
          'description' => '',
        ),
      ),
    ),
    'stripimage' => 
    array (
      'functionName' => 'stripImage',
      'description' => 'Strips an image of all profiles and comments.',
      'methodDescription' => 'Strips an image of all profiles and comments',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'stripimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'swirlimage' => 
    array (
      'functionName' => 'swirlImage',
      'description' => 'Swirls the pixels about the center of the image, where degrees indicates
   the sweep of the arc through which each pixel is moved. You get a more
   dramatic effect as the degrees move from 1 to 360.',
      'methodDescription' => 'Swirls the pixels about the center of the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'swirlimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => '',
        ),
      ),
    ),
    'textureimage' => 
    array (
      'functionName' => 'textureImage',
      'description' => 'Repeatedly tiles the texture image across and down the image canvas.',
      'methodDescription' => 'Repeatedly tiles the texture image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'textureimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'texture_wand',
          'description' => '',
        ),
      ),
    ),
    'thresholdimage' => 
    array (
      'functionName' => 'thresholdImage',
      'description' => 'Changes the value of individual pixels based on the intensity of each pixel
   compared to threshold.  The result is a high-contrast, two color image.',
      'methodDescription' => 'Changes the value of individual pixels based on a threshold',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'thresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'threshold',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'thumbnailimage' => 
    array (
      'functionName' => 'thumbnailImage',
      'description' => 'Changes the size of an image to the given dimensions and removes any
   associated profiles. The goal is to produce small, low cost thumbnail
   images suited for display on the Web. 

   If True; is given as a third parameter then columns and rows parameters
   are used as maximums for each side. Both sides will be scaled down until
   they match or are smaller than the parameter given for the side.',
      'methodDescription' => 'Changes the size of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'thumbnailimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'Image width',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'Image height',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => 'Whether to force maximum values',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'fill',
          'description' => '',
        ),
      ),
    ),
    'tintimage' => 
    array (
      'functionName' => 'tintImage',
      'description' => 'Applies a color vector to each pixel in the image. The length of the vector
   is 0 for black and white and at its maximum for the midtones. The vector
   weighing function is f(x)=(1-(4.0*((x-0.5)*(x-0.5)))).',
      'methodDescription' => 'Applies a color vector to each pixel in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'tintimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'tint',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'mixed',
          'name' => 'opacity',
          'description' => '',
        ),
      ),
    ),
    'transformimage' => 
    array (
      'functionName' => 'transformImage',
      'description' => 'A convenience method for setting crop size and the image geometry from strings.
   Available since 6.2.9',
      'methodDescription' => 'Convenience method for setting crop size and the image geometry',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'transformimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'crop',
          'description' => 'A crop geometry string. This geometry defines a subregion of the image to crop.',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'geometry',
          'description' => 'An image geometry string. This geometry defines the final size of the image.',
        ),
      ),
    ),
    'transparentpaintimage' => 
    array (
      'functionName' => '',
      'description' => '',
      'methodDescription' => '',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'transparentpaintimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'transposeimage' => 
    array (
      'functionName' => 'transposeImage',
      'description' => 'Creates a vertical mirror image by reflecting the pixels 
   around the central x-axis while rotating them 90-degrees.
   Available since 6.2.9',
      'methodDescription' => 'Creates a vertical mirror image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'transposeimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'transverseimage' => 
    array (
      'functionName' => 'transverseImage',
      'description' => 'Creates a horizontal mirror image by reflecting the pixels around the
   central y-axis while rotating them 270-degrees.
   Available since 6.2.9',
      'methodDescription' => 'Creates a horizontal mirror image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'transverseimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'trimimage' => 
    array (
      'functionName' => 'trimImage',
      'description' => 'Remove edges that are the background color from the image. 
   Available since 6.2.9',
      'methodDescription' => 'Remove edges from the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'trimimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'By default target must match a particular pixel color exactly.
       However, in many cases two colors may differ by a small amount.
       The fuzz member of image defines how much tolerance is acceptable
       to consider two colors as the same. This parameter represents the variation
       on the quantum range.',
        ),
      ),
    ),
    'uniqueimagecolors' => 
    array (
      'functionName' => 'uniqueImageColors',
      'description' => 'Discards all but one of any pixel color. 
   Available since 6.2.9',
      'methodDescription' => 'Discards all but one of any pixel color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'uniqueimagecolors.xml',
      'parameters' => 
      array (
      ),
    ),
    'unsharpmaskimage' => 
    array (
      'functionName' => 'unsharpMaskImage',
      'description' => 'Sharpens an image. We convolve the image with a Gaussian operator of the given
   radius and standard deviation (sigma). For reasonable results, radius should be
   larger than sigma.  Use a radius of 0 and Imagick::UnsharpMaskImage() selects a
   suitable radius for you.',
      'methodDescription' => 'Sharpens an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'unsharpmaskimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'amount',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'threshold',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'valid' => 
    array (
      'functionName' => 'valid',
      'description' => 'Checks if the current item is valid.',
      'methodDescription' => 'Checks if the current item is valid',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'valid.xml',
      'parameters' => 
      array (
      ),
    ),
    'vignetteimage' => 
    array (
      'functionName' => 'vignetteImage',
      'description' => 'Softens the edges of the image in vignette style. 
   Available since 6.2.9',
      'methodDescription' => 'Adds vignette filter to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'vignetteimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'blackPoint',
          'description' => 'The black point.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'whitePoint',
          'description' => 'The white point',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X offset of the ellipse',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y offset of the ellipse',
        ),
      ),
    ),
    'waveimage' => 
    array (
      'functionName' => 'waveImage',
      'description' => 'Applies a wave filter to the image. 
   Available since 6.2.9',
      'methodDescription' => 'Applies wave filter to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'waveimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'amplitude',
          'description' => 'The amplitude of the wave.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'length',
          'description' => 'The length of the wave.',
        ),
      ),
    ),
    'whitethresholdimage' => 
    array (
      'functionName' => 'whiteThresholdImage',
      'description' => 'Is like Imagick::ThresholdImage() but force all pixels above the threshold
   into white while leaving all pixels below the threshold unchanged.',
      'methodDescription' => 'Force all pixels above the threshold into white',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'whitethresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'threshold',
          'description' => '',
        ),
      ),
    ),
    'writeimage' => 
    array (
      'functionName' => 'writeImage',
      'description' => 'Writes an image to the specified filename. If the filename parameter is NULL,
   the image is written to the filename set by Imagick::readImage() or
   Imagick::setImageFilename().',
      'methodDescription' => 'Writes an image to the specified filename',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'writeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => 'Filename where to write the image. The extension of the filename
       defines the type of the file. 
       Format can be forced regardless of file extension using format: prefix,
       for example "jpg:test.png".',
        ),
      ),
    ),
    'writeimagefile' => 
    array (
      'functionName' => 'writeImageFile',
      'description' => 'Writes the image sequence to an open filehandle. The handle must be opened with
   for example fopen. Available since 6.3.6',
      'methodDescription' => 'Writes an image to a filehandle',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'writeimagefile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'resource',
          'name' => 'filehandle',
          'description' => 'Filehandle where to write the image',
        ),
      ),
    ),
    'writeimages' => 
    array (
      'functionName' => 'writeImages',
      'description' => 'Writes an image or image sequence.',
      'methodDescription' => 'Writes an image or image sequence',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'writeimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'adjoin',
          'description' => '',
        ),
      ),
    ),
    'writeimagesfile' => 
    array (
      'functionName' => 'writeImagesFile',
      'description' => 'Writes all image frames into an open filehandle. This method can be used to write
   animated gifs or other multiframe images into open filehandle.
   Available since 6.3.6',
      'methodDescription' => 'Writes frames to a filehandle',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'writeimagesfile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'resource',
          'name' => 'filehandle',
          'description' => 'Filehandle where to write the images',
        ),
      ),
    ),
  ),
);
    protected $category;
    protected $example;
    protected $categoryCase;
    protected $exampleCase;


    function __construct(\ImagickDemo\Helper\PageInfo $pageInfo)
    {
        $category = $pageInfo->getCategory();
        $example = $pageInfo->getExample();
    
        $this->category = strtolower($category);
        $this->example = strtolower($example);
    }
}