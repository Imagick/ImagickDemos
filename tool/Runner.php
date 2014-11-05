<?php


require __DIR__.'/../vendor/autoload.php';
require __DIR__."/../src/bootstrap.php";

$injector = bootstrapInjector(
    $libratoKey,
    $libratorUsername,
    $statsSourceName
);

$injector->alias('ImagickDemo\Queue\TaskQueue', 'ImagickDemo\Queue\RedisTaskQueue');
$injector->share('ImagickDemo\Queue\RedisTaskQueue');
$taskQueue = $injector->make('ImagickDemo\Queue\TaskQueue');

$taskRunner = $injector->make('ImagickDemo\Queue\ImagickTaskRunner');

$taskRunner->run();

echo "TaskRunner finished.\n";

