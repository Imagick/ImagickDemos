<?php

require '../vendor/autoload.php';
require '../src/bootstrap.php';



$injector = bootstrapInjector();

$phatsD = $injector->make('Stats\SimpleStats');

$phatsD->run();



