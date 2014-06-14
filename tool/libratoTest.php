<?php

require '../vendor/autoload.php';
require '../src/bootstrap.php';

use Stats\Gauge;
use Stats\Counter;


$injector = bootstrapInjector();

$gauges = [];
$counters = [];

$queuesToCheck = [
    'ImagickDemo\Queue\RedisTaskQueue',
];

foreach ($queuesToCheck as $queueName) {
    $taskQueue = $injector->make($queueName);
    $gauge = new Gauge(
        $taskQueue->getName(),
        $taskQueue->getQueueCount(),
        'test.phpimagick.com'
    );

    $gauges[] = $gauge;
}

$asyncStats = $injector->make('Stats\AsyncStats');


$asyncStats->recordCount('foo', 50, 'test.phpimagick.com');
$asyncStats->recordCount('foo', 60, 'test.phpimagick.com');

$counters = array_merge($counters, $asyncStats->getCounters());

var_dump($counters);



$librato = $injector->make('Stats\Librato');


//$librato->send($gauges, $counters);

