<?php


namespace ImagickDemo;

use Danack\Console\Application;
use Danack\Console\Command\Command;
use Danack\Console\Input\InputArgument;

class ConsoleApplication extends Application
{
    /**
     * Creates a console application with all of the commands attached.
     */
    public function __construct()
    {
        parent::__construct("ImagickDemos", "1.0.0");
        $statsCommand = new Command('statsRunner', 'Stats\SimpleStats::run');
        $statsCommand->setDescription("Run the stats collector and send the results to Librato.");
        $this->add($statsCommand);
    
        $taskCommand = new Command('imageRunner', 'ImagickDemo\Queue\ImagickTaskRunner::run');
        $taskCommand->setDescription("Pull image request jobs off the queue and generated the images.");
        $this->add($taskCommand);
    
        $clearCacheCommand = new Command('clearCache', 'ImagickDemo\Config\APCCacheEnvReader::clearCache');
        $clearCacheCommand->setDescription("Clear the apc cache.");
        $this->add($clearCacheCommand);
    
        $envWriteCommand = new Command('genEnvSettings', 'ImagickDemo\Config\EnvConfWriter::writeEnvFile');
        $envWriteCommand->setDescription("Write an env setting bash script.");
        $envWriteCommand->addArgument('env', InputArgument::REQUIRED, 'Which environment the settings should be generated for.');
        $envWriteCommand->addArgument('filename', InputArgument::REQUIRED, 'The file name that the env settings should be written to.');
        $this->add($envWriteCommand);
        
    
        $clearRedisCommand = new Command('clearRedis', 'ImagickDemo\Queue\ImagickTaskQueue::clearStatusQueue');
        $clearRedisCommand->setDescription("Clear the imagick task queue.");
        $this->add($clearRedisCommand);
    }

}
