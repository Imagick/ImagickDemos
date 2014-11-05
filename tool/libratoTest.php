<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/bootstrap.php';

$injector = bootstrapInjector(
    $libratoKey,
    $libratorUsername,
    $statsSourceName
);

$phatsD = $injector->make('Stats\SimpleStats');
$phatsD->run();



