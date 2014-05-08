<?php

namespace ImagickDemo\ImagickPixelIterator;


class getNextIteratorRow extends \ImagickDemo\Imagick\ImagickExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imageIterator = $imagick->getPixelIterator();

        $count = 0;
        while ($pixels = $imageIterator->getNextIteratorRow()) {
            if (($count % 3) == 0) {
                foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
                    /** @var $pixel \ImagickPixel */
                    if ($column % 2) {
                        $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
                    }
                }
                $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
            }

            $count += 1;
        }

        header("Content-Type: image/jpg");
        echo $imagick;
    }
}
