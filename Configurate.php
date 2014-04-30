<?php

namespace BaseReality\Tool;

define('PATH_TO_ROOT', './');

require_once('./vendor/autoload.php');

use Intahwebz\Configurator\Configurator;

class Configurate {

    private $filesToGenerate;

    private $environment;

    private $inputDir;
    private $outputDir;

    function getRequiredArgs() {
        return array('argCount' => 1 );
    }
    
    function setArg($position, $value) {
        $allowedVars = array(
            'amazonec2',
            'macports',
            'centos',
            'centos_guest',
        );

        if (in_array($value, $allowedVars) == true){
                $this->environment = $value;
        }
        else{
            $errorMessage = "Environment [$value] not known.";

            $separatorString = '';
            foreach ($allowedVars as $allowedVar) {
                $errorMessage .= $separatorString.$allowedVar;
                $separatorString = ', ';
            }
            
            throw new \Exception($errorMessage);
        }
        
        $this->environment = $value;
    }
    

    function init(array $properties = array()) {

        $this->inputDir = $properties['inputDir'];
        $this->outputDir = $properties['outputDir'];
    
        $this->filesToGenerate = array(
            $this->inputDir.'data/conf/imagick.nginx.conf.php' => $this->outputDir.'autogen/imagick.nginx.conf',
            $this->inputDir.'data/conf/imagick.php-fpm.conf.php' => $this->outputDir.'autogen/imagick.php-fpm.conf',
            $this->inputDir.'data/conf/imagick-demos.php.ini.php' => $this->outputDir.'autogen/imagick-demos.php.ini',
        );
    }

    function main() {

        $configurator = new Configurator();
        
        if ($this->environment == null) {
            throw new \Exception("Configurate does not have it's environment set.");
        }

        $configurator->addConfig($this->environment, "/home/intahwebz/intahwebz/conf/deployConfig.php");

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


$tool = new Configurate();


$properties = [];
$properties['inputDir'] = PATH_TO_ROOT;
$properties['outputDir'] = PATH_TO_ROOT;

$tool->setArg(0, 'centos_guest');

$tool->init(
    $properties 
);

$tool->main();