<?php

$fmt = datefmt_create(
    'en_US',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'America/Los_Angeles',
    IntlDateFormatter::GREGORIAN
);
echo 'timezone_id of the formatter is : ' . datefmt_get_timezone_id($fmt);


exit(0);


$alpha = 50;

$debug = '';

ob_start();


$debug .= "Oblevel is: ".ob_get_level()."\n";

$draw = new ImagickDraw();

$draw->setFillAlpha($alpha / 100);

$debug .= "Oblevel is: ".ob_get_level()."\n";

ob_end_clean();

echo $debug;


