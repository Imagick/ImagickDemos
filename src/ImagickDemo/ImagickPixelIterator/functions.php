<?php

namespace ImagickDemo\ImagickPixelIterator;

class functions
{
    public static function load()
    {
    }
}

/**
 * Hack the header function to allow us to capture the image type,
 * while still having clean example code.
 *
 * @param $string
 * @param bool $replace
 * @param null $http_response_code
 */
function header($string, $replace = true, $http_response_code = null)
{
    global $imageType;
    global $cacheImages;

    if (stripos($string, "Content-Type: image/") === 0) {
        $imageType = substr($string, strlen("Content-Type: image/"));
    }

    if ($cacheImages == false) {
        \header($string, $replace, $http_response_code);
    }
}


//$imagick = new \Imagick(realpath($imagePath));
//$imagick2 = clone $imagick;
//$imageIterator1 = new \ImagickPixelIterator($imagick);
//$imageIterator2 = new \ImagickPixelIterator($imagick2);
//
//$imageIterator2->reset();
//
///* Loop through pixel rows */
//foreach ($imageIterator1 as $pixelRow1) { 
//
//    if (!$imageIterator2->valid()) {
//        // need to check validity when iterating manually
//        break;
//    }
//
//	$pixelRow2 = $imageIterator2->current();
//    /* Loop through the pixels in the row (columns) */
//
//    foreach ($pixelRow1 as $column => $pixel1) { 
//        /** @var $pixel \ImagickPixel */
//        if ($column % 2) {
//            /* Paint every second pixel black*/
//            $pixel1->setColor("rgba(0, 0, 0, 0)");
//        }
//        else{
//            $pixel2 = $pixelRow2[$column];
//            //do something to $imagick2 here 
//            $pixel2->setColor("rgba(255, 255, 255, 0)");
//        }
//        
//        $count++;
//    }
//
//    $imageIterator2->next();
//    /* Sync the iterator, this is important to do on each iteration */
//    $imageIterator1->syncIterator();
//    $imageIterator2->syncIterator();
//}



//Example ImagickPixelIterator::clear
function clear($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelRegionIterator(100, 100, 250, 200);

    /* Loop through pixel rows */
    foreach ($imageIterator as $pixels) {
        /** @var $pixel \ImagickPixel */
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
//Example end


//Example ImagickPixelIterator::construct
function construct($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = new \ImagickPixelIterator($imagick);

    /* Loop through pixel rows */
    foreach ($imageIterator as $pixels) {
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $column => $pixel) {
            /** @var $pixel \ImagickPixel */
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
//Example end


//Example ImagickPixelIterator::getNextIteratorRow
function getNextIteratorRow($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelIterator();

    $count = 0;
    while (($pixels = $imageIterator->getNextIteratorRow())) {
        if (($count % 3) == 0) {
            /* Loop through the pixels in the row (columns) */
            foreach ($pixels as $column => $pixel) {
                /** @var $pixel \ImagickPixel */
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
//Example end


//Example ImagickPixelIterator::resetIterator
function resetIterator($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));

    $imageIterator = $imagick->getPixelIterator();

    /* Loop through pixel rows */
    foreach ($imageIterator as $pixels) {
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $column => $pixel) {
            /** @var $pixel \ImagickPixel */
            if ($column % 2) {
                /* Make every second pixel 25% red*/
                $pixel->setColorValue(\Imagick::COLOR_RED, 64);
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
            /** @var $pixel \ImagickPixel */
            if ($column % 3) {
                $pixel->setColorValue(\Imagick::COLOR_BLUE, 64); /* Make every second pixel a little blue*/
                //$pixel->setColor("rgba(0, 0, 128, 0)"); /* Paint every second pixel black*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    $imageIterator->clear();

    header("Content-Type: image/jpg");
    echo $imagick;
}
//Example end


//Example ImagickPixelIterator::setIteratorRow
function setIteratorRow($imagePath)
{
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelRegionIterator(200, 100, 200, 200);

    for ($x = 0; $x < 20; $x++) {
        $imageIterator->setIteratorRow($x * 5);
        $pixels = $imageIterator->getCurrentIteratorRow();
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $pixel) {
            /** @var $pixel \ImagickPixel */
            /* Paint every second pixel black*/
            $pixel->setColor("rgba(0, 0, 0, 0)");
        }

        /* Sync the iterator, this is important to do on each iteration */
        $imageIterator->syncIterator();
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}
//Example end


//Example ImagickPixelIterator::syncIteratorImage
class Pixel
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
    $imagick = new \Imagick(realpath($imagePath));

    $imageIterator = $imagick->getPixelRegionIterator(125, 100, 275, 200);

    /* Loop through pixel rows */
    foreach ($imageIterator as $pixels) {
        $pixelStatck = new PixelStack();
        /* Loop through the pixels in the row (columns) */
        foreach ($pixels as $pixel) {
            /** @var $pixel \ImagickPixel */
            $pixelStatck->pushPixel($pixel->getColorValue(\Imagick::COLOR_RED), $pixel->getColorValue(\Imagick::COLOR_GREEN), $pixel->getColorValue(\Imagick::COLOR_BLUE));

            $color = sprintf("rgb(%d, %d, %d)", intval($pixelStatck->getAverageRed() * 255), intval($pixelStatck->getAverageGreen() * 255), intval($pixelStatck->getAverageBlue() * 255));

            $pixel->setColor($color);
        }

        /* Sync the iterator, this is important to do on each iteration */
        $imageIterator->syncIterator();
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}
//Example end
