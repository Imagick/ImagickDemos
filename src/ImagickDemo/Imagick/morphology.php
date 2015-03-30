<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Framework\VariableMap;
use ImagickDemo\CustomImage;

class morphology extends \ImagickDemo\Example implements CustomImage {
    
    private $usageControl;
    
    private $morphologyType;

    private $functionTable;
    
    
    private static $correlateMatrix = [
        [-1, false, false],
        [false, false, false],
        [false, false, 1]
    ];

    //CustomImage
    function getCustomImageParams() {
        return ['morphologyType' => $this->morphologyType];
    }

    public function renderCustomImage() {
        if (array_key_exists($this->morphologyType, $this->functionTable) == true) {
            $method = $this->functionTable[$this->morphologyType];
            $this->{$method}();
        }
        else {
            //$this->renderBlank();
        }
    }

    function __construct(\ImagickDemo\ImagickKernel\Control\usage $usageControl, VariableMap $variableMap) {
        $this->usageControl = $usageControl;
        $this->morphologyType = $variableMap->getVariable('morphologyType', \Imagick::MORPHOLOGY_EDGE_IN);
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
        $output = "Applies a morpholohy effect to an image using an ImagickKernel. Please see the <a href='http://www.imagemagick.org/Usage/morphology/'>ImageMagick page on Morpgology</a> for exact details. <br/>&nbsp;<br/>";

        if (array_key_exists($this->morphologyType, $this->functionTable) == false) {
            $output .= "Example not done yet.";
        }
        
        
        switch ($this->morphologyType) {
            case(\Imagick::MORPHOLOGY_CONVOLVE):{
                $output .= "Applies the kernel to the image with as a convolve (aka multiplication) function.";
                break;
            }
            case(\Imagick::MORPHOLOGY_CORRELATE):{
                $correlateTable = renderKernelTable(self::$correlateMatrix);

                $output .= "Applies the kernel to the image with as a correlation (aka pattern matching) function. The kernel <br/>&nbsp;<br/>".$correlateTable." <br/> finds the top left edges in an image. The value '1' means the pixel there must be white, '-1' means the pixel must be black and false means we do not care what color that pixel has.";
                break;
            }
            case(\Imagick::MORPHOLOGY_ERODE):{
                $output .= "Erode the edges of an image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_DILATE):{
                $output .= "Dilate (expand) the edges of an image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_ERODE_INTENSITY):{
                $output .= "Erode the edges of a color image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_DILATE_INTENSITY):{
                $output .= "Dilate (expand) the edges of a color image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_DISTANCE."Chebyshev"):{
                $output .= "Measure the distance from the edge using the Chebyshev kernel.";
                break;
            }
            case(\Imagick::MORPHOLOGY_DISTANCE."Manhattan"):{
                $output .= "Measure the distance from the edge using the Manhattan kernel.";
                break;
            }
            case(\Imagick::MORPHOLOGY_DISTANCE."Octagonal"):{
                $output .= "Measure the distance from the edge using the Octagonal kernel.";
                break;
            }
            case(\Imagick::MORPHOLOGY_DISTANCE."Euclidian"):{
                $output .= "Measure the distance from the edge using the Euclidian kernel.";
                break;
            }
            case(\Imagick::MORPHOLOGY_ITERATIVE):{

                break;
            }
            case(\Imagick::MORPHOLOGY_OPEN):{
                $output .= "Open smooths the outline, by rounding off any sharp points, and removing any parts that is smaller than the shape used. It will also disconnect or 'open' any thin bridges.";
                
                break;
            }
            case(\Imagick::MORPHOLOGY_CLOSE): {
                $output .= "The basic effect of this operator is to smooth the outline of the shape, by filling in (closing) any holes, and indentations. It also will form connecting 'bridges' to other shapes that are close enough for the kernel to touch both simultaneously. But it does not make the basic 'core' size of the shape larger or smaller.";
                break;
            }
            case(\Imagick::MORPHOLOGY_OPEN_INTENSITY):{
                $output .= "Open smooths the outline, but for a color image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_CLOSE_INTENSITY):{
                $output .= "Open closes the outline, but for a color image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_SMOOTH):{
                $output .= "Smooths the edge of an image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_EDGE_IN):{
                $output .= "Find the inside edge of an image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_EDGE_OUT):{
                $output .= "Find the outside edge of an image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_EDGE):{
                $output .= "Find the edge of an image. This is the sum of the 'edge in' and 'edge out'.";
                break;
            }
            case(\Imagick::MORPHOLOGY_TOP_HAT):{
                $output .= "The 'TopHat' method, or more specifically 'White Top Hat', returns the pixels that were removed by a Opening of the shape, that is the pixels that were removed to round off the points, and the connecting bridged between shapes.";
                break;
            }
            case(\Imagick::MORPHOLOGY_BOTTOM_HAT):{
                $output .= "The 'BottomHat' method, also known as 'Black TopHat' is the pixels that a Closing of the shape adds to the image. That is the the pixels that were used to fill in the 'holes', 'gaps', and 'bridges'.";
                break;
            }
            case(\Imagick::MORPHOLOGY_HIT_AND_MISS ):{

                $output .= "The 'Hit-And-Miss' morphology method, also commonly known as 'HMT' in computer science literature, is a high level morphology method that is specifically designed to find and locate specific patterns in images. It does this by looking for a specific configuration of 'foreground' and 'background' pixels around the 'origin'.";
                
                break;
            }
            case(\Imagick::MORPHOLOGY_THINNING):{
                $output .= "The 'Thinning' method is the dual of 'Thicken'. Rather than adding pixels, this method subtracts them from the original image.";
                break;
            }
            case(\Imagick::MORPHOLOGY_THICKEN."Standard"):{
                $output .= "The 'Thicken' method will add pixels to the original shape at every matching location.";
                break;
            }
            case(\Imagick::MORPHOLOGY_THICKEN."Convex"):{
                $output .= "The actual 'ConvexHull' kernel is really designed to work with image shapes, and will expand a shape into a 'Octagonal Convex Hull'. That is it will try to fill in all the gaps between the extremes until it produces a 'octagonal shaped' object.";
                break;
            }
        }

        return $output;
    }


    function render() {
        if (array_key_exists($this->morphologyType, $this->functionTable) == false) {
            return '';
        }

        return $this->renderCustomImageURL([], $this->getOriginalImage());
    }



    private function renderBlank() {
        $canvas = $this->getCharacterOutline();
        header("Content-Type: image/png");
        echo $canvas->getImageBlob();
    }

    private function renderConvolve() {
//Example Imagick::morphology Convolve
        $imagick = $this->getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_GAUSSIAN, "5,1");
        $imagick->morphology(\Imagick::MORPHOLOGY_CONVOLVE, 2, $kernel);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
//Example end
    }
    
    
    private function renderCorrelate() {
//Example Imagick::morphology Correlate

        // Top-left pixel must be black
        // Bottom right pixel must be white
        // We don't care about the rest.
        

        $imagick = $this->getCharacterOutline();
        $kernel = \ImagickKernel::fromMatrix(self::$correlateMatrix, [2, 2]);
        $imagick->morphology(\Imagick::MORPHOLOGY_CORRELATE, 1, $kernel);
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
    }
//Example end
}