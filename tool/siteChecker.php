<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/siteCheckerFunctions.php';

use Behat\Mink\Mink;
use Behat\Mink\Session;
use DMore\ChromeDriver\ChromeDriver;

$site_checker = new \SiteChecker2("http://internal.phpimagick.com");
$site_checker->addLinkToProcess("/");
//$site_checker->addImageToProcess('/image/Imagick/medianFilterImage?time=1634169229931');
$finished = false;

$site_checker->checkEverything();


$site_checker->dumpResult();