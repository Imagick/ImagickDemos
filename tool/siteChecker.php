<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/siteCheckerFunctions.php';


$site_checker = new \SiteChecker2("http://internal.phpimagick.com");
$site_checker->addLinkToProcess("/");
//$site_checker->addImageToProcess('/image/Imagick/haldClutImage?image_path=Lorikeet&hald_clut_type=contrast&time=1634218895218');
$finished = false;

$site_checker->checkEverything();


$site_checker->dumpResult();