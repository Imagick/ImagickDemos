<?php

namespace ImagickDemo\Imagick;


class getImageChannelStatistics extends \ImagickDemo\Example {


    function renderImage() {
        $imagick = new \Imagick(realpath("../images/fnord.png"));
        header("Content-Type: image/png");
        echo $imagick->getimageblob();
    }

    function render() {

        $imagick = new \Imagick(realpath("../images/fnord.png"));

        $newCanvas = new \Imagick();
        $newCanvas->newImage($imagick->getImageWidth(), $imagick->getImageHeight(), 'rgba(255, 255, 0, 1)', 'png');

        $newCanvas->compositeimage($imagick, \Imagick::COMPOSITE_ATOP, 0, 0);

//header("Content-Type: image/png");
//echo $newCanvas->getImageBlob();
//exit(0);

        function dumpInfo(\Imagick $imagick) {

            $identifyInfo = $imagick->getImageChannelStatistics();

            foreach ($identifyInfo as $key => $value) {

                echo "$key :";

                if (is_array($value) == true) {
                    var_dump($value);
                }
                else {
                    echo $value;
                }

                echo "<br/>";
            }
        }

        dumpInfo($imagick);
        echo "<br/><br/>";
        dumpInfo($newCanvas);

//Array (
//    [0] => Array (
//        [mean] => 0
//        [minima] => 1.0E+37
//        [maxima] => -1.0E-37
//        [standardDeviation] => 0
//        [depth] => 1
//)
//[1] => Array (
//        [mean] => 23313.62737415
//        [minima] => 0
//        [maxima] => 65535
//        [standardDeviation] => 19872.553413701
//        [depth] => 8 )
//    [2] => Array (
//
//    [mean] => 17901.918582313
//    [minima] => 0
//    [maxima] => 65535
//    [standardDeviation] => 12436.215219275
//    [depth] => 8 )
//    [4] => Array (
//        [mean] => 12943.608840816
//        [minima] => 0
//        [maxima] => 65535
//        [standardDeviation] => 12513.107409344
//        [depth] => 8 )
//    [8] => Array (
//        [mean] => 0
//        [minima] => 1.0E+37
//        [maxima] => -1.0E-37
//        [standardDeviation] => 0
//        [depth] => 1
//)
//    [32] => Array (
//        [mean] => 0
//        [minima] => 1.0E+37
//        [maxima] => -1.0E-37
//        [standardDeviation] => 0
//        [depth] => 1 )
//)

    }
}