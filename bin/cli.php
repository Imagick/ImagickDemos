<?php


use Danack\Console\Application;
use Danack\Console\Output\BufferedOutput;
use Danack\Console\Command\Command;

//use Danack\Console\Formatter\OutputFormatterStyle;
//use Danack\Console\Helper\QuestionHelper;
//use Danack\Console\Input\InputArgument;

require __DIR__.'/../src/bootstrap.php';

$injector = bootstrapInjector();

$application = createApplication();

//Figure out what Command was requested.
try {
    $parsedCommand = $application->parseCommandLine();
}
catch(\Exception $e) {
    //@TODO change to just catch parseException when that's implemented 
    $output = new BufferedOutput();
    $application->renderException($e, $output);
    echo $output->fetch();
    exit(-1);
}

try {
    $input = $parsedCommand->getInput();
    $keynames = formatKeyNames($parsedCommand->getParams());
    $injector->execute(
        $parsedCommand->getCallable(),
        $keynames
    );
}
catch(\Exception $e) {
    echo "Unexpected exception of type ".get_class($e)." running Bastion: ".$e->getMessage().PHP_EOL;
    echo $e->getTraceAsString();
    exit(-2);
}


/**
 * @param $params
 * @return array
 */
function formatKeyNames($params) {
    $newParams = [];
    foreach ($params as $key => $value) {
        $newParams[':'.$key] = $value;
    }

    return $newParams;
}



/**
 * Creates a console application with all of the commands attached.
 * @return Application
 */
function createApplication() {
//    $rpmCommand = new Command('rpmdir', ['Bastion\RPMProcess', 'packageSingleDirectory']);
//    $rpmCommand->addArgument('directory', InputArgument::REQUIRED, "The directory containing the composer'd project to build into an RPM.");
////$uploadCommand->addOption('dir', null, InputArgument::OPTIONAL, 'Which directory to upload from', './');
//    $rpmCommand->setDescription("Build an RPM from an directory that contains all the files of a project. Allows for faster testing than having to re-tag, and download zip files repeatedly.");

    
    $statsCommand = new Command('libratoStats', 'Stats\SimpleStats::run');
    $statsCommand->setDescription("Run the stats collector and send the results to Librato.");

    $taskCommand = new Command('taskRunner', 'ImagickDemo\Queue\ImagickTaskRunner::run');
    $taskCommand->setDescription("Run the stats collector and send the results to Librato.");

    $clearCacheCommand = new Command('clearCache', 'ImagickDemo\Config\APCCacheEnvReader::clearCache');
    $clearCacheCommand->setDescription("Clear the apc cache.");

    $console = new Application("ImagickDemos", "1.0.0");
    $console->add($statsCommand);
    $console->add($taskCommand);
    $console->add($clearCacheCommand);


    return $console;
}