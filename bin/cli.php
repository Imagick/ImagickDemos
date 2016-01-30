<?php

use Danack\Console\Application;
use Danack\Console\Output\BufferedOutput;
use Danack\Console\Command\Command;
use Danack\Console\Input\InputArgument;

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/appFunctions.php';
require __DIR__.'/../src/cliFunctions.php';

register_shutdown_function('fatalErrorShutdownHandler');
set_exception_handler('exceptionHandler');
set_error_handler('errorHandler');

//Figure out what Command was requested.
try {
    $application = createApplication();
    $parsedCommand = $application->parseCommandLine();
}
catch (\Exception $e) {
    //@TODO change to just catch parseException when that's implemented
    $output = new BufferedOutput();
    $application->renderException($e, $output);
    echo $output->fetch();
    exit(-1);
}

$injector = new \Auryn\Injector();
$injectionParams = require __DIR__."/../src/injectionParams.php";

$injectionParams->addToInjector($injector);

chdir(realpath(__DIR__).'/../imagick');

try {
    $input = $parsedCommand->getInput();
    foreach ($parsedCommand->getParams() as $key => $value) {
        $injector->defineParam($key, $value);
    }
    $injector->execute($parsedCommand->getCallable());
}
catch (Auryn\InjectionException $ie) {
    echo "Injection exception: ".$ie->getMessage()."\n";
    echo "Dependency chain is:\n";
    foreach ($ie->getDependencyChain() as $dependency) {
        echo "    $dependency\n";
    }
    
    echo $ie->getTraceAsString();
}
catch (\Exception $e) {
    echo "Unexpected exception of type ".get_class($e)." running imagick-demos: ".$e->getMessage().PHP_EOL;
    echo $e->getTraceAsString();
    exit(-2);
}

/**
 * Creates a console application with all of the commands attached.
 * @return Application
 */
function createApplication()
{
    $statsCommand = new Command('statsRunner', 'Stats\SimpleStats::run');
    $statsCommand->setDescription("Run the stats collector and send the results to Librato.");

    $taskCommand = new Command('imageRunner', 'ImagickDemo\Queue\ImagickTaskRunner::run');
    $taskCommand->setDescription("Pull image request jobs off the queue and generated the images.");

    $clearCacheCommand = new Command('clearCache', 'ImagickDemo\Config\APCCacheEnvReader::clearCache');
    $clearCacheCommand->setDescription("Clear the apc cache.");

    $envWriteCommand = new Command('genEnvSettings', 'ImagickDemo\Config\EnvConfWriter::writeEnvFile');
    $envWriteCommand->setDescription("Write an env setting bash script.");
    $envWriteCommand->addArgument('env', InputArgument::REQUIRED, 'Which environment the settings should be generated for.');
    $envWriteCommand->addArgument('filename', InputArgument::REQUIRED, 'The file name that the env settings should be written to.');

    $clearRedisCommand = new Command('clearRedis', 'ImagickDemo\Queue\ImagickTaskQueue::clearStatusQueue');
    $clearRedisCommand->setDescription("Clear the imagick task queue.");

    $console = new Application("ImagickDemos", "1.0.0");
    $console->add($statsCommand);
    $console->add($taskCommand);
    $console->add($clearCacheCommand);
    $console->add($clearRedisCommand);
    $console->add($envWriteCommand);

    return $console;
}
