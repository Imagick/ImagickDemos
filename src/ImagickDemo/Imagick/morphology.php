<?php

namespace ImagickDemo\Imagick;

use Intahwebz\Request;

class morphology extends \ImagickDemo\Example {
    
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
        $output = "Applies a morpholohy effect to an image using an ImagickKernel.<br/>";

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
//Example Imagick::morphology Convolve
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
//Example Imagick::morphology Correlate
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
//Example Imagick::morphology Erode
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_ERODE, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    
    private function renderErodeIntensity() {
//Example Imagick::morphology Erode Intensity
        $canvas = $this->getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "1");
        $canvas->morphology(\Imagick::MORPHOLOGY_ERODE_INTENSITY, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDilate() {
//Example Imagick::morphology Dilate
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_DILATE, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDilateIntensity() {
//Example Imagick::morphology Dilate intensity
        $canvas = $this->getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "1");
        $canvas->morphology(\Imagick::MORPHOLOGY_DILATE_INTENSITY, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }


    private function renderDistanceChebyshev() {
//Example Imagick::morphology Distance with Chebyshev kernel
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_CHEBYSHEV, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDistanceManhattan() {
//Example Imagick::morphology Distance with Manhattan kernel
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_MANHATTAN, "5");
        $canvas->morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDistanceOctagonal() {
//Example Imagick::morphology Distance with ocatagonal kernel
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGONAL, "5");
        $canvas->morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDistanceEuclidian() {
//Example Imagick::morphology Distance with Euclidean kernel
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_EUCLIDEAN, "4");
        $canvas->morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas->autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderEdge() {
//Example Imagick::morphology Edge
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_EDGE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderOpen() {
//Example Imagick::morphology Open
        // As a result you will see that 'Open' smoothed the outline, by rounding off any sharp points, and remove any parts that is smaller than the shape used. It will also disconnect or 'open' any thin bridges.
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\Imagick::MORPHOLOGY_OPEN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }


    
    private function renderOpenIntensity() {
//Example Imagick::morphology Open intensity
        // As a result you will see that 'Open' smoothed the outline, by rounding off any sharp points, and remove any parts that is smaller than the shape used. It will also disconnect or 'open' any thin bridges.

        $canvas = $this->getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\Imagick::MORPHOLOGY_OPEN_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderClose() {
//Example Imagick::morphology Close
        //The basic use of the 'Close' method is to reduce or remove any 'holes' or 'gaps' about the size of the kernel 'Structure Element'. That is 'close' parts of the background that are about that size.
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\Imagick::MORPHOLOGY_CLOSE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderCloseIntensity() {
//Example Imagick::morphology Close Intensity
        //The basic use of the 'Close' method is to reduce or remove any 'holes' or 'gaps' about the size of the kernel 'Structure Element'. That is 'close' parts of the background that are about that size.
        $canvas = $this->getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas->morphology(\Imagick::MORPHOLOGY_CLOSE_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }


    private function renderSmooth() {
//Example Imagick::morphology Smooth
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_SMOOTH, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }
    
    private function renderEdgeIn() {
//Example Imagick::morphology Edge in
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_EDGE_IN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderEdgeOut() {
//Example Imagick::morphology Edge out
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas->morphology(\Imagick::MORPHOLOGY_EDGE_OUT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderTopHat() {
//Example Imagick::morphology The 'TopHat' method, or more specifically 'White Top Hat', returns the pixels that were removed by a Opening of the shape, that is the pixels that were removed to round off the points, and the connecting bridged between shapes.
        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "5");
        $canvas->morphology(\Imagick::MORPHOLOGY_TOP_HAT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderBottomHat() {

//Example Imagick::morphology The 'BottomHat' method, also known as 'Black TopHat' is the pixels that a Closing of the shape adds to the image. That is the the pixels that were used to fill in the 'holes', 'gaps', and 'bridges'.

        $canvas = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "5");
        $canvas->morphology(\Imagick::MORPHOLOGY_BOTTOM_HAT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }


    private function renderHitAndMiss() {
//Example Imagick::morphology Hit and Miss
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
//Example Imagick::morphology Thinning
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
//Example Imagick::morphology Thicken
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
//Example Imagick::morphology Thick to generate a convex hull
        $canvas = $this->getCharacterOutline();
        $diamondKernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DIAMOND, "1");
        $convexKernel =  \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_CONVEX_HULL, "");

        // The thicken morphology doesn't handle small gaps. We close them
        // with the close morphology.
        $canvas->morphology(\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);
        $canvas->morphology(\Imagick::MORPHOLOGY_THICKEN, -1, $convexKernel);
        $canvas->morphology(\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);

        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
//Example end
    }

    private function renderDistanceIterative() {
//Example Imagick::morphology Iterative morphology
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

//Example Imagick::morphology Helper functon to get an image silhouette
    private function getCharacterOutline() {

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