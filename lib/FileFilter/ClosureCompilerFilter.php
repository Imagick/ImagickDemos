<?php

namespace FileFilter;

use Psr\Log\LoggerInterface;

class ClosureCompilerFilter extends FileFilter
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @var string
     */
    private $storagePath;

    /**
     * @var string
     */
    private $externalLibPath;

    public function __construct(
        FileFilter $previousFilter,
        LoggerInterface $logger,
        $externalLibPath,
        $storagePath,
        $filterUpdateMode = FileFilter::CHECK_EXISTS_MTIME_AND_PREVIOUS
    ) {

        $this->logger =  $logger;
        $this->storagePath = $storagePath;
        $this->externalLibPath = $externalLibPath;
        $this->previousFilter = $previousFilter;
        $this->srcFile = $previousFilter->getFile();
        $this->destFile = $this->srcFile->addExtension('min', true);
        $this->filterUpdateMode = $filterUpdateMode;
    }

    public function filter($tempMinifiedFilename)
    {
        $originalFilename = $this->srcFile->getPath();
        $jarPath = $this->externalLibPath.'/closurecompiler/compiler.jar';
        $command = "java -jar $jarPath --warning_level QUIET --language_in ECMASCRIPT5 --compilation_level SIMPLE_OPTIMIZATIONS --js $originalFilename --js_output_file $tempMinifiedFilename";

        //SIMPLE_OPTIMIZATIONS
        //ADVANCED_OPTIMIZATIONS
        //java -jar compiler.jar --compilation_level ADVANCED_OPTIMIZATIONS --js hello.js
        
        $output = system($command, $returnValue);

        if ($returnValue != 0) {
            @unlink($tempMinifiedFilename);
            $logging = "command is $command <br/>" ;
            $logging .= "curr dir ".getcwd()."<br/>";
            $logging .= "returnValue $returnValue <br/>";
            $logging .= "result is: ";
            $logging .= "Output is: ".$output."<br/>";

            $this->logger->critical("Failed to generate minified Javascript: ".$logging);

            header("Content-type: text/javascript");
            header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
            
            echo "alert('Javacript not generated. Someone please tell the server dude \"$originalFilename\" failed.')";
            exit(0);
        }
    }
}
