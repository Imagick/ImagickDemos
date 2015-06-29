<?php


namespace ImagickDemo\Config;

use ImagickDemo\Config;
use Configurator\Configurator;

class EnvConfWriter
{
    private $env;
    private $outputFilename;

    public function __construct($env, $filename)
    {
        $this->env = $env;
        $this->outputFilename = $filename;
    }

    public function writeEnvFile()
    {
        $configurator = new Configurator();
        $configurator->addPHPConfig($this->env, __DIR__."/../../../../clavis.php");
        $contents = "";        
        $config = $configurator->getConfig();
        $envVarsToWrite = \ImagickDemo\Config::getConfigNames();

        foreach ($envVarsToWrite as $key ) {
            if (array_key_exists($key, $config) == false) {
                throw new \Exception("Value not set for $key");
            }
            
            $value = $config[$key];
            
            $key = str_replace('.', "_", $key);
            
            $contents .= "export \"$key\"=\"$value\"\n";
        }

        file_put_contents($this->outputFilename, $contents);
    }
}

