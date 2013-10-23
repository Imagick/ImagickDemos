<?php


$imagick = new Imagick();
$quantumRange = $imagick->getQuantumRange();





print_r($quantumRange);

//array (size=2)
//  'quantumRangeLong' => int 65535
//  'quantumRangeString' => string '65535' (length=5)


$quantumDepth = $imagick->getQuantumDepth();

print_r($quantumDepth);

//array (size=2)
//  'quantumDepthLong' => int 16
//  'quantumDepthString' => string 'Q16' (length=3)