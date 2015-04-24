<?php

namespace ImagickDemo\Tutorial;



class fontEffect extends \ImagickDemo\Example {
    
//    private $usageControl;
//    
//    private $morphologyType;
//
//    private $functionTable;

//    function __construct(\ImagickDemo\ImagickKernel\Control\usage $usageControl, Request $request) {
//        $this->usageControl = $usageControl;
//        $this->morphologyType = $request->getVariable('morphologyType', \Imagick::MORPHOLOGY_EDGE_IN);
//        parent::__construct($usageControl);
//
//        $this->functionTable = [
//            \Imagick::MORPHOLOGY_CONVOLVE => "renderConvolve",
//            \Imagick::MORPHOLOGY_CORRELATE  => "renderCorrelate",
//        ];
//    }


    function renderDescription() {
        $output = "Font effects are cool.";

        return $output;
    }

    function render() {
//        if (array_key_exists($this->morphologyType, $this->functionTable) == false) {
//            return '';
//        }

        return $this->renderCustomImageURL([], $this->getOriginalImage());
    }

    public function renderCustomImage() {
//        if (array_key_exists($this->morphologyType, $this->functionTable) == true) {
//            $method = $this->functionTable[$this->morphologyType];
//            $this->{$method}();
//        }
//        else {
//            $this->renderBlank();
//        }

        $this->renderDistanceEuclidian();
    }

    private function getCharacter() {
        $imagick = new \Imagick(realpath("./images/character.png"));

        return $imagick;
    }


    private function drawText(\Imagick $imagick, $shadow = false) {
        $draw = new \ImagickDraw();
        
        if ($shadow == true) {
            $draw->setStrokeColor('black');
            $draw->setStrokeWidth(8);
            $draw->setFillColor('black');
        }
        else {
            $draw->setStrokeColor('none');
            $draw->setStrokeWidth(1);
            $draw->setFillColor('lightblue');
        }

        $draw->setFontSize(96);
        $text = "Imagick\nExample";
        $draw->setFont("../fonts/Candy.TTF");
        $draw->setGravity(\Imagick::GRAVITY_SOUTHWEST);
        $imagick->annotateimage($draw, 40, 40, 0, $text);

        if ($shadow == true) {
            $imagick->blurImage(10, 5);
        }
        
        return $imagick;
    }

    private function getSilhouette(\Imagick $imagick) {
        $character = new \Imagick();
        $character->newPseudoImage(
            $imagick->getImageWidth(),
            $imagick->getImageHeight(),
            "canvas:white"
        );
        $canvas = new \Imagick();
        $canvas->newPseudoImage(
            $imagick->getImageWidth(),
            $imagick->getImageHeight(),
            "canvas:black"
        );
        $character->compositeimage(
            $imagick,
            \Imagick::COMPOSITE_COPYOPACITY,
            0, 0
        );
        $canvas->compositeimage(
            $character,
            \Imagick::COMPOSITE_ATOP,
            0, 0
        );
        $canvas->setFormat('png');

        return $canvas;
    }



    
    private function renderDistanceEuclidian() {

        $canvas = new \Imagick();
        $canvas->newPseudoImage(
            500,
            300,
            "canvas:none"
        );

        $canvas->setImageFormat('png');
        $shadow = clone $canvas;

        $text = clone $canvas;
        

        $this->drawText($text);

        $this->drawText($shadow, true);

    
        if (false) {
            $highlight = $this->getSilhouette($text);

            $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_EUCLIDEAN, "1");
            $highlight->morphology(\Imagick::MORPHOLOGY_DISTANCE, 1, $kernel);
            $highlight->autoLevelImage();
            $highlight->evaluateimage(\Imagick::EVALUATE_MULTIPLY, 0.6);
            $highlight->evaluateimage(\Imagick::EVALUATE_ADD, 0.2 * \Imagick::getQuantum());

            $highlight->levelImage(0.2, 1.4, 0.6);

            $text->compositeimage(
                $highlight,
                \Imagick::COMPOSITE_MODULATE,
                0, 0
            );
        }

        if (true) {
            $edge = $this->getSilhouette($text);


            $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "2");
            $edge->morphology(\Imagick::MORPHOLOGY_EDGE_IN, 1, $kernel);

            $edge->compositeImage(
                $text,
                \Imagick::COMPOSITE_ATOP,
                0, 0
            );

        }
        
        

        $canvas->compositeImage(
            $shadow,
            \Imagick::COMPOSITE_COPY,
            0, 0
        );

        $canvas->compositeImage(
            $text,
            \Imagick::COMPOSITE_ATOP,
            0, 0
        );
        
        
        
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
    }


}