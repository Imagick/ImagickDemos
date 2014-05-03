<?php

//require_once "../functions.php";


namespace ImagickDemo\Imagick;


/**
 * @param $width
 * @param $height
 * @param $colorPoints - the point positions should be expressed in the range 0..1 space
 * @param $sparseMethod
 * @param bool $absolute
 * @throws \InvalidArgumentException
 * @return \Imagick
 */
function createGradientImage($width, $height, $colorPoints, $sparseMethod, $absolute = false) {

    $imagick = new \Imagick();
    $imagick->newImage($width, $height, "white");
    $imagick->setImageFormat("png");

    $barycentricPoints = array();

    foreach ($colorPoints as $colorPoint) {

        if ($absolute == true) {
            $barycentricPoints[] = $colorPoint[0];
            $barycentricPoints[] = $colorPoint[1];
        }
        else {
            $barycentricPoints[] = $colorPoint[0] * $width;
            $barycentricPoints[] = $colorPoint[1] * $height;
        }

        if (is_string($colorPoint[2])) {
            $imagickPixel = new \ImagickPixel($colorPoint[2]);
        }
        else if ($colorPoint[2] instanceof \ImagickPixel) {
            $imagickPixel = $colorPoint[2];
        }
        else{
            throw new \InvalidArgumentException("Value ".$colorPoint[2]." is neither a string nor an ImagickPixel class. Cannot use as a color.");
        }

        $red = $imagickPixel->getColorValue(\Imagick::COLOR_RED);
        $green = $imagickPixel->getColorValue(\Imagick::COLOR_GREEN);
        $blue = $imagickPixel->getColorValue(\Imagick::COLOR_BLUE);
        $alpha = $imagickPixel->getColorValue(\Imagick::COLOR_ALPHA);

        $barycentricPoints[] = $red;
        $barycentricPoints[] = $green;
        $barycentricPoints[] = $blue;
        $barycentricPoints[] = $alpha;
    }

    $imagick->sparseColorImage($sparseMethod, $barycentricPoints);

    return $imagick;
}


class sparseColorImage extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/sparseColorImage'/>";
    }

    function renderDescription() {

        $foo = <<< 'END'

  <p>
  Fill an image with color with the defined sparse color method.
  </p>
  
  <p>
  Barycentric - Maps three colors onto a linear triangle of color. The colors outside this triangle continue as before. This method is useful for creating smooth gradients of color.</p>
  
  <p>
  Bilinear - This method fits an equation to 4 points, over all three color channels to produce a uniform color gradient between the points, and beyond.</p>
  
  <p>Shepards  - The "Shepards" method uses a ratio of the inverse squares of the distances to each of the given points to determine the color of the canvas at each point.</p>
  
  <p>
  Voronoi - Maps each pixel in the image to the color of the closest point point provided. This basically divides the image into a set of polygonal 'cells' around each point.</p>
  
  <p>
  http://www.imagemagick.org/Usage/canvas/#sparse-color
  </p>
  
END;
  
    return $foo;

    }


    function renderImageBarycentric2() {
    

        require_once "../functions.php";

        $points = [[0.30, 0.10, 'red'], [0.10, 0.80, 'blue'], [0.70, 0.60, 'lime'], [0.80, 0.20, 'yellow'],];

        $imagick = createGradientImage(400, 400, $points, \Imagick::SPARSECOLORMETHOD_BARYCENTRIC);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }

    function renderImage() {

        $points = [[0.30, 0.10, 'red'], [0.10, 0.80, 'blue'], [0.70, 0.60, 'lime'], [0.80, 0.20, 'yellow'],];

        $imagick = createGradientImage(500, 500, $points, \Imagick::SPARSECOLORMETHOD_BILINEAR);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
    
    function renderImagePolynomial() {

        try {
            $points = [1, 2, 1, 2, 1, 1, 2, 3, 4, 5, 1, 2, 3, 4, 5, 400, 500, 3, 4, 5,];

            $imagick = new \Imagick();
            $imagick->newImage(500, 500, "white");
            $imagick->setImageFormat("png");

            $imagick->sparseColorImage(\Imagick::SPARSECOLORMETHOD_POLYNOMIAL, $points);

            header("Content-Type: image/png");
            echo $imagick->getImageBlob();

        } catch (\Exception $e) {
            echo "Exception: " . $e->getMessage();
            echo "hmm";
        }
    }

    function renderImageShepards() {
        $points = [[0.30, 0.10, 'red'], [0.10, 0.80, 'blue'], [0.70, 0.60, 'lime'], [0.80, 0.20, 'yellow'],];
        $imagick = createGradientImage(600, 600, $points, \Imagick::SPARSECOLORMETHOD_SPEPARDS);
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
    
    function renderImageVoronoi() {

        $points = [[0.30, 0.10, 'red'], [0.10, 0.80, 'blue'], [0.70, 0.60, 'lime'], [0.80, 0.20, 'yellow'],];

        $imagick = createGradientImage(500, 500, $points, \Imagick::SPARSECOLORMETHOD_VORONOI);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();

    }
    
    function renderImageBarycentric() {

        $points = [[0, 0, 'skyblue'], [-1, 1, 'skyblue'], [1, 1, 'black'],];

        $imagick = createGradientImage(600, 200, $points, \Imagick::SPARSECOLORMETHOD_BARYCENTRIC);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();


        /*
        
        Fill an image with color with the defined sparse color method.
        
        Barycentric - Maps three colors onto a linear triangle of color. The colors outside this triangle continue as before. This method is useful for creating smooth gradients of color.
        
        Bilinear - This method fits an equation to 4 points, over all three color channels to produce a uniform color gradient between the points, and beyond.
        
        Shepards  - The "Shepards" method uses a ratio of the inverse squares of the distances to each of the given points to determine the color of the canvas at each point.
        
        Voronoi - Maps each pixel in the image to the color of the closest point point provided. This basically divides the image into a set of polygonal 'cells' around each point.
        
        
        See also
        http://www.imagemagick.org/Usage/canvas/#sparse-color
        
        For the spare method types that take a set of color points as a parameter, for each color point the array should contain an entries for:
        
        positionX, positiony - The position of the point in the image
        R, G, B, A - A normalised (i.e. 0-255 value) for each of the color channels
        
        
        
        function createGradientImage($width, $height, $colorPoints, $sparseMethod) {
        
            $imagick = new \Imagick();
            $imagick->newImage($width, $height, "white");
            $imagick->setImageFormat("png");
        
            $barycentricPoints = array();
        
            foreach ($colorPoints as $colorPoint) {
                $barycentricPoints[] = $colorPoint[0] * $width;
                $barycentricPoints[] = $colorPoint[1] * $height;
        
                if (is_string($colorPoint[2])) {
                    $imagickPixel = new \ImagickPixel($colorPoint[2]);
                }
                else if ($colorPoint[2] instanceof ImagickPixel) {
                    $imagickPixel = $colorPoint[2];
                }
                else{
                    throw new \InvalidArgumentException("Value ".$colorPoint[2]." is neither a string nor an ImagickPixel class. Cannot use as a color.");
                }
        
                $red = $imagickPixel->getColorValue(\Imagick::COLOR_RED);
                $green = $imagickPixel->getColorValue(\Imagick::COLOR_GREEN);
                $blue = $imagickPixel->getColorValue(\Imagick::COLOR_BLUE);
                $alpha = $imagickPixel->getColorValue(\Imagick::COLOR_ALPHA);
        
                $barycentricPoints[] = $red;
                $barycentricPoints[] = $green;
                $barycentricPoints[] = $blue;
                $barycentricPoints[] = $alpha;
            }
        
            $imagick->sparseColorImage($sparseMethod, $barycentricPoints);
        
            return $imagick;
        }
        
        
        
        $imagick->writeimage(realpath($tempFilename));
        
        $points = [
            [0, 0, 'skyblue'],
            [-1, 1, 'skyblue'],
            [1, 1, 'black'],
        ];
        
        $imagick = createGradientImage(600, 200, $points, \Imagick::SPARSECOLORMETHOD_BARYCENTRIC);
        
        $imagick->writeimage(realpath("./skyblueGradient.png"));
        
        
        $points = [
            [0.30, 0.10, 'red'],
            [0.10, 0.80, 'blue'],
            [0.70, 0.60, 'lime'],
            [0.80, 0.20, 'yellow'],
        ];
        
        
        $imagick = createGradientImage(400, 400, $points, \Imagick::SPARSECOLORMETHOD_BARYCENTRIC);
        $imagick->writeimage(realpath("./colorfulGradient.png"));
        
        
        */

    }
}