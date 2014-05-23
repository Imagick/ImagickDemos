<?php


namespace ImagickDemo\ImagickPixel;

define('NL', '<br/>');

class isSimilar extends \ImagickDemo\Example {

    function render() {

        echo "These tests need a modern version of Imagick due to the https://github.com/mkoppanen/imagick/issues/10 <br/> Also, a distance of '1' is the maximum distance in the color space e.g. from 0, 0, 0 to 255, 255, 255 in RGB <br/>";

        $root3 = 1.732050807568877;

        $tests = array(
            ['rgb(245, 0, 0)',      'rgb(255, 0, 0)',   9 / $root3,         false,],
            ['rgb(245, 0, 0)',      'rgb(255, 0, 0)',  10 / $root3,         true,],
            ['rgb(0, 0, 0)',        'rgb(7, 7, 0)',     9 / $root3,         false,],
            ['rgb(0, 0, 0)',        'rgb(7, 7, 0)',    10 / $root3,         true,],
            ['rgba(0, 0, 0, 1)',    'rgba(7, 7, 0, 1)', 9 / $root3,         false,],
            ['rgba(0, 0, 0, 1)',    'rgba(7, 7, 0, 1)',    10 / $root3,     true,],
            ['rgb(128, 128, 128)',  'rgb(128, 128, 120)',   7 / $root3,     false,],
            ['rgb(128, 128, 128)',  'rgb(128, 128, 120)',   8 / $root3,     true,],
            ['rgb(0, 0, 0)',        'rgb(255, 255, 255)',   254.9,          false,],
            ['rgb(0, 0, 0)',        'rgb(255, 255, 255)',   255,            true,],
            ['rgb(255, 0, 0)',      'rgb(0, 255, 255)',     254.9,          false,],
            ['rgb(255, 0, 0)',      'rgb(0, 255, 255)',     255,            true,],
            ['black',               'rgba(0, 0, 0)',        0.0,            true],
            ['black',               'rgba(10, 0, 0, 1.0)',  10.0 / $root3,  true],);

            foreach ($tests as $testInfo) {
                $color1 = $testInfo[0];
                $color2 = $testInfo[1];
                $distance = $testInfo[2];
                $expectation = $testInfo[3];
                $testDistance = ($distance / 255.0);

                $color1Pixel = new \ImagickPixel($color1);
                $color2Pixel = new \ImagickPixel($color2);
                
                

                $isSimilar = $color1Pixel->isPixelSimilar($color2Pixel, $testDistance);

                if ($isSimilar !== $expectation) {
                    echo "Test distance failed. Color [$color1] compared to color [$color2] is not within distance $testDistance FAILED.".NL;
                }

                if ($isSimilar) {
                    printf("%s %s are similar <br/>", $color1, $color2);
                }
                else {
                    printf("%s %s are different <br/>", $color1, $color2);
                }
            }
    }
}