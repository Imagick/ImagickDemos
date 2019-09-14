<?php

declare(strict_types = 1);

use Danack\Console\Application;

// Holds functions that convert exceptions into command
// line output for use in the command line tools.


function cliHandleInjectionException(Application $console, \Auryn\InjectionException $ie)
{
    fwrite(STDERR, "time: " . date(\ImagickDemo\App::DATE_TIME_FORMAT) . " ");
//    $output = new \Danack\Console\Output\BufferedOutput();
//    $console->renderException($ie, $output);
//    fwrite(STDERR, $output->fetch());
//
//    fwrite(STDERR, "Stacktrace:\n");


    fwrite(STDERR, getTextForException($ie) . "\n");
    fwrite(STDERR, "Dependency chain:\n");
    fwrite(STDERR, implode("\n  ", $ie->getDependencyChain()));
    fwrite(STDERR, "\n");

    exit(-1);
}

function cliHandleGenericException(Application $console, \Exception $e)
{
    fwrite(STDERR, "time: " . date(\ImagickDemo\App::DATE_TIME_FORMAT) . "\n");

    fwrite(STDERR, getTextForException($e) . "\n");

//    $output = new \Danack\Console\Output\BufferedOutput();
//    $console->renderException($e, $output);
//    fwrite(STDERR, $output->fetch());
//
//    fwrite(STDERR, "Stacktrace:\n");
//    fwrite(STDERR, $e->getTraceAsString() . "\n");

    exit(-1);
}
