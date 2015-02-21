<?php

namespace ImagickDemo\ImagickKernel;



use Intahwebz\Request;

class usage extends \ImagickDemo\Example {
    
    private $usageControl;
    
    private $morphologyType;

    private $functionTable;

    function __construct(\ImagickDemo\ImagickKernel\Control\usage $usageControl, Request $request) {
        $this->usageControl = $usageControl;
        $this->morphologyType = $request->getVariable('morphologyType', \Imagick::MORPHOLOGY_EDGE_IN);
        parent::__construct($usageControl);

        $this->functionTable = [
            \Imagick::MORPHOLOGY_CONVOLVE => "renderConvolve",
            \Imagick::MORPHOLOGY_CORRELATE  => "renderCorrelate",
            \Imagick::MORPHOLOGY_ERODE => "renderErode",
            \Imagick::MORPHOLOGY_DILATE => "renderDilate",
            \Imagick::MORPHOLOGY_ERODE_INTENSITY => "renderErodeIntensity",
            \Imagick::MORPHOLOGY_DILATE_INTENSITY => "renderDilateIntensity",
            \Imagick::MORPHOLOGY_DISTANCE => "renderDistance",
            \Imagick::MORPHOLOGY_DISTANCE."Chebyshev" => "renderDistanceChebyshev",
            \Imagick::MORPHOLOGY_DISTANCE."Manhattan" => "renderDistanceManhattan",
            \Imagick::MORPHOLOGY_DISTANCE."Octagonal" => "renderDistanceOctagonal",
            \Imagick::MORPHOLOGY_DISTANCE."Euclidian" => "renderDistanceEuclidian",
            \Imagick::MORPHOLOGY_ITERATIVE => "renderDistanceIterative",
            \Imagick::MORPHOLOGY_OPEN => "renderOpen",
            \Imagick::MORPHOLOGY_CLOSE => "renderClose",
            \Imagick::MORPHOLOGY_OPEN_INTENSITY => "renderOpenIntensity",
            \Imagick::MORPHOLOGY_CLOSE_INTENSITY => "renderCloseIntensity",
            \Imagick::MORPHOLOGY_SMOOTH => "renderSmooth",
            \Imagick::MORPHOLOGY_EDGE_IN => "renderEdgeIn",
            \Imagick::MORPHOLOGY_EDGE_OUT => "renderEdgeOut",
            \Imagick::MORPHOLOGY_EDGE => "renderEdge",
            \Imagick::MORPHOLOGY_TOP_HAT => "renderTopHat",
            \Imagick::MORPHOLOGY_BOTTOM_HAT  => "renderBottomHat",
            \Imagick::MORPHOLOGY_HIT_AND_MISS => "renderHitAndMiss",
            \Imagick::MORPHOLOGY_THINNING => "renderThinning",
            \Imagick::MORPHOLOGY_THICKEN."Standard" => "renderThicken",
            \Imagick::MORPHOLOGY_THICKEN."Convex" => "renderThickenConvexHull",
            //\Imagick::MORPHOLOGY_VORONOI => "renderVoronoi",
        ];
    }

    function getOriginalImage() {
        return $this->control->getCustomImageURL(['original' => true]);
    }

    function renderOriginalImage() {
        $characterMethods = [
            \Imagick::MORPHOLOGY_CONVOLVE,
            \Imagick::MORPHOLOGY_ERODE_INTENSITY,
            \Imagick::MORPHOLOGY_DILATE_INTENSITY,
            \Imagick::MORPHOLOGY_OPEN_INTENSITY,
            \Imagick::MORPHOLOGY_CLOSE_INTENSITY
        ];
        
        if (in_array($this->morphologyType, $characterMethods)) {
            $imagick = new \Imagick(realpath("./images/character.png"));
            header("Content-Type: image/png");
            echo $imagick->getImageBlob();
            return;
        }

        $canvas = $this->getCharacterOutline();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
    }

    function renderDescription() {
        $output = "What are kernels used for anyway? <br/>";

        if (array_key_exists($this->morphologyType, $this->functionTable) == false) {
            $output .= "Example not done yet.";
            return $output;
        }

        return $output;
    }
    
    function renderTitle() {
        return "";
    }

    function render() {
        if (array_key_exists($this->morphologyType, $this->functionTable) == false) {
            return '';
        }

        return $this->renderCustomImageURL([], $this->getOriginalImage());
    }

    public function renderCustomImage() {
        if (array_key_exists($this->morphologyType, $this->functionTable) == true) {
            $method = $this->functionTable[$this->morphologyType];
            $this->{$method}();
        }
        else {
            $this->renderBlank();
        }
    }

    private function renderBlank() {
        $canvas = $this->getCharacterOutline();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
    }

    private function renderConvolve() {
//Example ImagickKernel::morphology
        $matrix = [
            [0.0, 0.5, 0.0],
            [0.5, 1.0, 0.5],
            [0.0, 0.5, 0.0],
        ];
        $imagick = new \Imagick(realpath("./images/character.png"));
        $kernel = \ImagickKernel::fromMatrix($matrix);
        $imagick->morphology(\Imagick::MORPHOLOGY_CONVOLVE, 2, $kernel);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
//Example end
    }
    
    
    private function renderCorrelate() {
//Example ImagickKernel::morphology
        $matrix = [
            [0.0, 0.5, 0.0],
            [0.5, 1.0, 0.5],
            [0.0, 0.5, 0.0],
        ];
        $imagick = new \Imagick(realpath("./images/character.png"));
        $kernel = \ImagickKernel::fromMatrix($matrix);
        $imagick->morphology(\Imagick::MORPHOLOGY_CORRELATE, 2, $kernel);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
//Example end
    }
    
    
    private function renderErode() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_ERODE, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    
    private function renderErodeIntensity() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "1");
        $canvas->morphology(\Imagick::MORPHOLOGY_ERODE_INTENSITY, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDilate() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_DILATE, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDilateIntensity() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "1");
        $canvas->morphology(\Imagick::MORPHOLOGY_DILATE_INTENSITY, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }


    private function renderDistanceChebyshev() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_CHEBYSHEV, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDistanceManhattan() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_MANHATTAN, "5");
        $canvas->morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDistanceOctagonal() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGONAL, "5");
        $canvas->morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDistanceEuclidian() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_EUCLIDEAN, "4");
        $canvas->morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderEdge() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_EDGE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderOpen() {
//Example ImagickKernel::morphology
//        As a result you will see that 'Open' smoothed the outline, by rounding off any sharp points, and remove any parts that is smaller than the shape used. It will also disconnect or 'open' any thin bridges.
        
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\Imagick::MORPHOLOGY_OPEN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }


    
    private function renderOpenIntensity() {
//Example ImagickKernel::morphology
//        As a result you will see that 'Open' smoothed the outline, by rounding off any sharp points, and remove any parts that is smaller than the shape used. It will also disconnect or 'open' any thin bridges.

        $canvas = $this->getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\Imagick::MORPHOLOGY_OPEN_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderClose() {
//Example ImagickKernel::morphology
        //The basic use of the 'Close' method is to reduce or remove any 'holes' or 'gaps' about the size of the kernel 'Structure Element'. That is 'close' parts of the background that are about that size.
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\Imagick::MORPHOLOGY_CLOSE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderCloseIntensity() {
//Example ImagickKernel::morphology
        //The basic use of the 'Close' method is to reduce or remove any 'holes' or 'gaps' about the size of the kernel 'Structure Element'. That is 'close' parts of the background that are about that size.
        $canvas = $this->getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\Imagick::MORPHOLOGY_CLOSE_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }


    private function renderSmooth() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_SMOOTH, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }
    
    private function renderEdgeIn() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_EDGE_IN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderEdgeOut() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_EDGE_OUT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderTopHat() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "5");
        $canvas->morphology(\Imagick::MORPHOLOGY_TOP_HAT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderBottomHat() {
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "5");
        $canvas->morphology(\Imagick::MORPHOLOGY_BOTTOM_HAT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }


    private function renderHitAndMiss() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        //This finds all the pixels with 3 pixels of the right edge
        $matrix = [[1, false, false, 0]];
        $kernel = \ImagickKernel::fromMatrix(
            $matrix,
            [0, 0]
        );
        $canvas->morphology(\Imagick::MORPHOLOGY_HIT_AND_MISS, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }


    private function renderThinning() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $leftEdgeKernel = \ImagickKernel::fromMatrix([[0, 1]], [1, 0]);
        $rightEdgeKernel = \ImagickKernel::fromMatrix([[1, 0]], [0, 0]);
        $leftEdgeKernel->addKernel($rightEdgeKernel);
        
        $canvas->morphology(\Imagick::MORPHOLOGY_THINNING, 3, $leftEdgeKernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderThicken() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $leftEdgeKernel = \ImagickKernel::fromMatrix([[0, 1]], [1, 0]);
        $rightEdgeKernel = \ImagickKernel::fromMatrix([[1, 0]], [0, 0]);
        $leftEdgeKernel->addKernel($rightEdgeKernel);

        $canvas->morphology(\Imagick::MORPHOLOGY_THICKEN, 3, $leftEdgeKernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderThickenConvexHull() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $diamondKernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DIAMOND, "1");
        $convexKernel =  \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_CONVEX_HULL, "");

        $canvas->morphology(\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);
        $canvas->morphology(\Imagick::MORPHOLOGY_THICKEN, -1, $convexKernel);
        $canvas->morphology(\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);

        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDistanceIterative() {
//Example ImagickKernel::morphology
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "2");        
        $canvas->morphology(\Imagick::MORPHOLOGY_ITERATIVE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }
    
    
    private function getCharacter() {
        $imagick = new \Imagick(realpath("./images/character.png"));

        return $imagick;
    }

    private function getCharacterOutline() {
//Example ImagickKernel::morphology
        $imagick = new \Imagick(realpath("./images/character.png"));
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
//Example end
    }
}