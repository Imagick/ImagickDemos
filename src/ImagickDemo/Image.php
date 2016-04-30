<?php


namespace ImagickDemo;

class Image
{
    /**
     * @param \Imagick $imagick
     * @param int $graphWidth
     * @param int $graphHeight
     */
    public static function analyzeImage(\Imagick $imagick, $graphWidth = 255, $graphHeight = 127)
    {
        $sampleHeight = 20;
        $border = 2;
    
        $imagick->transposeImage();
        $imagick->scaleImage($graphWidth, $sampleHeight);
    
        $imageIterator = new \ImagickPixelIterator($imagick);
    
        $luminosityArray = [];
    
        foreach ($imageIterator as $row => $pixels) { /* Loop through pixel rows */
            foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
                /** @var $pixel \ImagickPixel */
    
                if (false) {
                    $color = $pixel->getColor();
                    $luminosityArray[] = $color['r'];
                }
                else {
                    $hsl = $pixel->getHSL();
                    $luminosityArray[] = ($hsl['luminosity']);
                }
            }
            /* Sync the iterator, this is important to do on each iteration */
            $imageIterator->syncIterator();
            break;
        }
    
        $draw = new \ImagickDraw();
    
        $strokeColor = new \ImagickPixel('red');
        $fillColor = new \ImagickPixel('red');
        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);
        $draw->setStrokeWidth(0);
        $draw->setFontSize(72);
        $draw->setStrokeAntiAlias(true);
        $previous = false;
    
        $x = 0;
    
        foreach ($luminosityArray as $luminosity) {
            $pos = ($graphHeight - 1) - ($luminosity * ($graphHeight - 1));
    
            if ($previous !== false) {
                /** @var $previous int */
                //printf ( "%d, %d, %d, %d <br/>\n" , $x - 1, $previous, $x, $pos);
                $draw->line($x - 1, $previous, $x, $pos);
            }
            $x += 1;
            $previous = $pos;
        }
    
        $plot = new \Imagick();
        $plot->newImage($graphWidth, $graphHeight, 'white');
        $plot->drawImage($draw);
    
        $outputImage = new \Imagick();
        $outputImage->newImage($graphWidth, $graphHeight + $sampleHeight, 'white');
        $outputImage->compositeimage($plot, \Imagick::COMPOSITE_ATOP, 0, 0);
    
        $outputImage->compositeimage($imagick, \Imagick::COMPOSITE_ATOP, 0, $graphHeight);
        $outputImage->borderimage('black', $border, $border);
        $outputImage->setImageFormat("png");
    
        App::cachingHeader("Content-Type: image/png");
        echo $outputImage;
    }

}
