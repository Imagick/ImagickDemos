<?php


$imagick = new Imagick(realpath("TestImage.jpg"));



$info = $imagick->getImageChannelStatistics();

print_r($info);


Array ( 
    [0] => Array ( 
        [mean] => 0 
        [minima] => 1.0E+37 
        [maxima] => -1.0E-37 
        [standardDeviation] => 0 
        [depth] => 1 
) 
[1] => Array ( 
        [mean] => 23313.62737415 
        [minima] => 0 
        [maxima] => 65535 
        [standardDeviation] => 19872.553413701 
        [depth] => 8 ) 
    [2] => Array ( 
    
    [mean] => 17901.918582313 
    [minima] => 0 
    [maxima] => 65535 
    [standardDeviation] => 12436.215219275 
    [depth] => 8 ) 
    [4] => Array ( 
        [mean] => 12943.608840816 
        [minima] => 0 
        [maxima] => 65535 
        [standardDeviation] => 12513.107409344 
        [depth] => 8 ) 
    [8] => Array ( 
        [mean] => 0 
        [minima] => 1.0E+37 
        [maxima] => -1.0E-37 
        [standardDeviation] => 0 
        [depth] => 1 
) 
    [32] => Array ( 
        [mean] => 0 
        [minima] => 1.0E+37 
        [maxima] => -1.0E-37 
        [standardDeviation] => 0 
        [depth] => 1 ) 
)
