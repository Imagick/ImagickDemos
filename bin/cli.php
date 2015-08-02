<?php


use Danack\Console\Application;
use Danack\Console\Output\BufferedOutput;
use Danack\Console\Command\Command;
use Danack\Console\Input\InputArgument;


require __DIR__.'/../src/bootstrap.php';

chdir(realpath(__DIR__).'/../imagick');


/**
 * @param $libratoKey
 * @param $libratorUsername
 * @param $statsSourceName
 * @return \Auryn\Injector
 */
function bootstrapInjector()
{
    $injector = new Auryn\Injector();

    $config = new \ImagickDemo\Config();
    $config->delegateShit($injector);
    $injector->share('Jig\JigConfig');
    $injector->share('ImagickDemo\Control');
    $injector->share('ImagickDemo\Example');
    $injector->share('ImagickDemo\Navigation\Nav');
    $injector->share('ImagickDemo\Queue\ImagickTaskQueue');
    $injector->share('ImagickDemo\Helper\PageInfo');
    $injector->share(\ImagickDemo\Config\Application::class);
    $injector->share(\ImagickDemo\Config\Librato::class);
    $injector->share('ImagickDemo\Framework\VariableMap');
    $injector->share('Predis\Client');
    
    $injector->alias('Intahwebz\Request', 'Intahwebz\Routing\HTTPRequest');
    $injector->alias('ImagickDemo\DocHelper', 'ImagickDemo\DocHelperDisplay');
    $injector->alias('ImagickDemo\Framework\VariableMap', 'ImagickDemo\Framework\RequestVariableMap');
    //$injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\PHPStormBanner');
    $injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\NullBanner');
    $injector->prepare('Jig\Converter\JigConverter', 'prepareJigConverter');

    if (false) {
        $injector->share('ASM\SessionManager');
        $injector->delegate('ASM\SessionManager', 'createSessionManager');
        $injector->share('ASM\Driver\RedisDriver');
        $injector->delegate('ASM\Driver\RedisDriver', 'createRedisSessionDriver');
    }

    $injector->delegate('ImagickDemo\Control', 'createControl');
    $injector->delegate('ImagickDemo\Example', 'createExample');

    $redisParameters = array(
        'connection_timeout' => 30,
        'read_write_timeout' => 30,
    );

    $redisOptions = [];

    $injector->define(
        'Predis\Client',
        array(
            ':parameters' => $redisParameters,
            ':options' => $redisOptions,
        )
    );

    $injector->defineParam('imageCachePath', "../var/cache/imageCache/");
    $injector->share($injector); //yolo - use injector as service locator

    $appConfig = $injector->make('ImagickDemo\Config\Application');
    /** @var  $appConfig \ImagickDemo\Config\Application */
    
    global $cacheImages;
    $cacheImages = $appConfig->getCacheImages();

    return $injector;
}


$injector = bootstrapInjector();

try {
    $application = createApplication();
}
catch(\Exception $e) {
    echo "Exception: ".$e->getMessage()."\n";
}

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
    foreach ($parsedCommand->getParams() as $key => $value) {
        $injector->defineParam($key, $value);
    }
    $injector->execute($parsedCommand->getCallable());
}
catch(\Exception $e) {
    echo "Unexpected exception of type ".get_class($e)." running imagick-demos: ".$e->getMessage().PHP_EOL;
    echo $e->getTraceAsString();
    exit(-2);
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