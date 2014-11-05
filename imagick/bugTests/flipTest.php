<?php
$imagick = new Imagick(realpath("../../images/Biter_500.jpg"));



//$imagick = new Imagick($image_path);
$imagickGrey = clone $imagick;
$imagickGrey->setimagetype(\Imagick::IMGTYPE_GRAYSCALE);
//
$differenceInfo = $imagick->compareimages($imagickGrey, \Imagick::METRIC_MEANABSOLUTEERROR);
//
//if ($differenceInfo['mean'] <= 0.0000001) {
//    echo "Grey enough";
//}
//
//
//var_dump($result);

//$imagick->setColorspace(imagick::COLORSPACE_HSB);
$imagick->setimagecolorspace(imagick::COLORSPACE_HSL);

//echo "Type is ".$imagick->getimagetype();


//$imagick->separateImageChannel(imagick::CHANNEL_RED);

//$imagick = @$imagick->flattenimages();



//var_dump($blah);

$info = $imagick->identifyImage(true);
$info = $imagick->getImageChannelStatistics();


//Array ( [mean] => 35639.63177 [minima] => 0 [maxima] => 65535 [standardDeviation] => 16431.32737093 [depth] => 8 ) 1 => 1 
//Array ( [mean] => 28435.375645 [minima] => 0 [maxima] => 65278 [standardDeviation] => 17602.929419927 [depth] => 8 ) 2 => 1 
//Array ( [mean] => 23727.652215 [minima] => 0 [maxima] => 65535 [standardDeviation] => 20191.98366081 [depth] => 8 ) 4 => 1 
//

foreach ($info as $key => $value) {
    
    if (is_array($value)) {
        echo "$key => ".print_r($value)." <br/>";
    }
    else {
        echo "$key => $value <br/>";
    }
}

exit(0);


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();  