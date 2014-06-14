<?php


require '../vendor/autoload.php';
require "../src/bootstrap.php";

$injector = bootstrapInjector();

$injector->alias('ImagickDemo\Queue\TaskQueue', 'ImagickDemo\Queue\RedisTaskQueue');
$injector->share('ImagickDemo\Queue\RedisTaskQueue');
$taskQueue = $injector->make('ImagickDemo\Queue\TaskQueue');

$taskRunner = $injector->make('ImagickDemo\Queue\ImagickTaskRunner');

$taskRunner->run();

echo "TaskRunner finished.\n";

