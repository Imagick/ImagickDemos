<?php


namespace ImagickDemo;

use Intahwebz\Configurator\Configurator;

class CLIConfigurator {

    private $environment;
    
    private $filesToGenerate;
    
    private static $knownEnviroments = array(
        'amazonec2',
        'macports',
        'centos',
        'centos_guest',
    );

    public function run($environment) {
        if (in_array($environment, self::$knownEnviroments) == false) {
            throw new \Exception(
                "$environment is not a known environment. Try one of ".
                implode(", ", self::$knownEnviroments)
            );
        }
        $this->environment = $environment;
        $this->main();
    }

    /**
     * @return array
     */
    public static function getKnownEnvs() {
        return self::$knownEnviroments;
    }


    /**
     * 
     */
    function __construct() {
        $this->inputDir = '../';
        $this->outputDir = '../';
    }

    /**
     * 
     */
    function init() {
        $this->filesToGenerate = array(
            $this->inputDir.'data/conf/imageTaskRunner.conf.php' => $this->outputDir.'autogen/imageTaskRunner.conf',
            $this->inputDir.'data/conf/libratoStats.conf.php' => $this->outputDir.'autogen/libratoStats.conf',
            $this->inputDir.'data/conf/imagick.nginx.conf.php' => $this->outputDir.'autogen/imagick.nginx.conf',
            $this->inputDir.'data/conf/imagick.php-fpm.conf.php' => $this->outputDir.'autogen/imagick.php-fpm.conf',
            $this->inputDir.'data/conf/imagick-demos.php.ini.php' => $this->outputDir.'autogen/imagick-demos.php.ini',
            $this->inputDir.'data/conf/addImagickConfig.sh.php' => $this->outputDir.'autogen/addConfig.sh',
        );
    }

    /**
     * @throws \Exception
     */
    function main() {
        $this->init();

        $configurator = new Configurator();

        $filepath = realpath("../data/deployConfig.php");
        if (!$filepath) {
            throw new \Exception("Config file deployConfig.php not accessible.");
        }
        $configurator->addConfig($this->environment, $filepath);

        foreach($this->filesToGenerate as $inputFilename => $outputFilename){
            $configFile = $configurator->configurate($inputFilename);
            @mkdir(dirname($outputFilename), 0755, true);
            $fileHandle = fopen($outputFilename, "w");

            if($fileHandle === FALSE){
                echo "Failed to read [".$outputFilename."] for writing.";
                exit(-1);
            }

            fwrite($fileHandle, $configFile);
            fclose($fileHandle);
        }

        \Intahwebz\Configurator\Functions::load();

        convertToFPM(
            $this->outputDir.'autogen/imagick-demos.php.ini',
            $this->outputDir.'autogen/imagick-demos.php.fpm.ini'
        );
    }
}

