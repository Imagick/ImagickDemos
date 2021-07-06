#!/usr/bin/env php
<?php

use Danack\Console\Application;
use Danack\Console\Output\BufferedOutput;
use ImagickDemo\CLIFunction;
use VarMap\VarMap;
use VarMap\ArrayVarMap;

error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
//require __DIR__ . '/lib/factories.php';
//require __DIR__ . '/lib/exception_mappers_cli.php'
require_once realpath(__DIR__) . '/src/option_functions.php';;
require __DIR__ . "/cli/cli_commands.php";
require __DIR__ . "/src/exception_mappers_cli.php";

set_time_limit(20);

$injector = new Auryn\Injector();

CLIFunction::setupErrorHandlers();

$cliInjectionParams = require __DIR__ . "/src/injectionParams.php";
$cliInjectionParams->addToInjector($injector);

$injector->share($injector);

chdir(realpath(__DIR__) . '/public');

$console = new Application();
add_console_commands($console);

try {
    $parsedCommand = $console->parseCommandLine();
}
catch (\Exception $e) {


    echo getTextForException($e);

//    $output = new BufferedOutput();
//    $console->renderException($e, $output);
//    echo $output->fetch();
    exit(-1);
}


$exceptionMappers = [
    Auryn\InjectionException::class => 'cliHandleInjectionException',
];

try {
    foreach ($parsedCommand->getParams() as $key => $value) {
        $injector->defineParam($key, $value);
    }

    $variableMap = new ArrayVarMap($parsedCommand->getParams());
    $injector->alias(VarMap::class, get_class($variableMap));
    $injector->share($variableMap);

    $injector->execute($parsedCommand->getCallable());
    echo "\n";
}


catch (\Exception $e) {

    foreach ($exceptionMappers as $exceptionType => $handler) {
        if ($e instanceof $exceptionType) {
            $handler($console, $e);
            return;
        }
    }

    cliHandleGenericException($console, $e);
}
