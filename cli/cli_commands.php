<?php

use Danack\Console\Application;
use Danack\Console\Command\Command;
use Danack\Console\Input\InputArgument;

/**
 * @param Application $console
 */
function add_console_commands(Application $console)
{
    addAllCommands($console);

}

/**
 * @param Application $console
 */
function addAllCommands(Application $console)
{
    $statsCommand = new Command('statsRunner', 'Stats\SimpleStats::run');
    $statsCommand->setDescription("Run the stats collector and send the results to Librato.");
    $console->add($statsCommand);

    $taskCommand = new Command('imageRunner', 'ImagickDemo\Queue\ImagickTaskRunner::run');
    $taskCommand->setDescription("Pull image request jobs off the queue and generated the images.");
    $console->add($taskCommand);

    $clearCacheCommand = new Command('clearCache', 'ImagickDemo\Config\APCCacheEnvReader::clearCache');
    $clearCacheCommand->setDescription("Clear the apc cache.");
    $console->add($clearCacheCommand);

//    $envWriteCommand = new Command('genEnvSettings', 'ImagickDemo\Config\EnvConfWriter::writeEnvFile');
//    $envWriteCommand->setDescription("Write an env setting bash script.");
//    $envWriteCommand->addArgument('env', InputArgument::REQUIRED, 'Which environment the settings should be generated for.');
//    $envWriteCommand->addArgument('filename', InputArgument::REQUIRED, 'The file name that the env settings should be written to.');
//    $console->add($envWriteCommand);
//

    $clearRedisCommand = new Command('clearRedis', 'ImagickDemo\Queue\ImagickTaskQueue::clearStatusQueue');
    $clearRedisCommand->setDescription("Clear the imagick task queue.");
    $console->add($clearRedisCommand);

}
