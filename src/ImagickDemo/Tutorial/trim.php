<?php


$base = new Imagick(realpath('./trim.png'));

$base->trimImage(0);

$geometry = $base->getImageGeometry();
$pageInfo = $base->getImagePage();

printf (
    "Width %d Height %d\n",
    $geometry['width'],
    $geometry['height']
);

printf(
    "OffsetX: %d OffsetY %d\n",
    $pageInfo['x'],
    $pageInfo['y']
);
