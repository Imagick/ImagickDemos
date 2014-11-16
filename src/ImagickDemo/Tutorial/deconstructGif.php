<?php


namespace ImagickDemo\Tutorial;


use Imagick;

//Example Tutorial::deconstructGif Make a simple gif with lots of frames.
function makeSimpleGif() {
    $aniGif = new \Imagick();
    $aniGif->setFormat("gif");

    $circleRadius = 20;
    $imageFrames = 40;
    $imageSize = 200;

    $background = new \Imagick();
    $background->newpseudoimage($imageSize, $imageSize, "plasma:tomato-steelblue");

    $blackWhite = new \Imagick();
    $blackWhite->newpseudoimage($imageSize, $imageSize, "gradient:black-white");

    $backgroundPalette = clone $background;
    $backgroundPalette->quantizeImage(240, \Imagick::COLORSPACE_RGB, 8, false, false);

    $blackWhitePalette = clone $blackWhite;
    $blackWhitePalette->quantizeImage(16, \Imagick::COLORSPACE_RGB, 8, false, false);

    $backgroundPalette->addimage($blackWhitePalette);

    for($count=0 ; $count<$imageFrames ; $count++){
        $drawing = new \ImagickDraw();
        $drawing->setFillColor('white');
        $drawing->setStrokeColor('rgba(64, 64, 64, 0.8)');
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

    return $aniGif;
}
//Example end

class deconstructGif extends \ImagickDemo\Example {


    /**
     * @var \Intahwebz\Request
     */
    private $request;

    function __construct(\ImagickDemo\Control $control, \Intahwebz\Request $request) {
        $this->control = $control;
        $this->request = $request;
    }

    function renderDescription() {
         $output = <<< END
ImageMagick has the ability to dramatically the file size of gifs that contain a large amount of area that is static.

It does this by analyzing the frames, detected which parts are not changing, and excluding those areas from being written to the Gif for the frames where there is no movement.

This optimization only works for images where there is a large amount of absolutely static image. It does not work for Gifs created from a video.

For the image below the normal vs the deconstructed file sizes are:

END;

        $output = nl2br($output);
        
        $output .= "<pre>Normal image:  2,133,864 bytes
Deconstructed:   108,772 bytes</pre>";
        
        return $output;
    }

    function render() {
        $output = '';
        //return $this->renderImageURL();
        $output .= 'Normal image:<br/>';
        $output .= sprintf("<img src='%s' />", $this->control->getCustomImageURL());

        $output .= "<br/>";
        $output .= 'Deconstructed image:<br/>';
        $output .= sprintf("<img src='%s' />", $this->control->getCustomImageURL(['deconstruct' => true]));

        return $output;
    }


    function renderCustomImage() {
        $deconstruct = $this->request->getVariable('deconstruct');
        $this->processGif($deconstruct);
    }


//Example Tutorial::deconstructGif
    function processGif($deconstruct) {
        
        $aniGif = makeSimpleGif();
        
        if ($deconstruct == true) {
            $aniGif = $aniGif->deconstructImages();
        }

        header("Content-Type: image/gif");
        echo $aniGif->getImagesBlob();        
    }
//Example end
}

 

