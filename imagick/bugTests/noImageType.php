<?php


$im = new Imagick();
$im->newPseudoImage(600, 600, "pattern:checkerboard");
$draw = new ImagickDraw();
/* some drawings */

$draw->circle(300, 300, 200, 200);

$im->drawImage($draw);
$im->writeImage('outputCLI.jpg');