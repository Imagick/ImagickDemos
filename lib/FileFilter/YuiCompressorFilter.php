<?php

namespace FileFilter;

class YuiCompressorFilter extends FileFilter
{
    /**
     * @var YuiCompressorPath
     */
    private $yuiCommpressorPath;

    /**
     * @param FileFilter $previousFilter
     * @param $destFile
     * @param YuiCompressorPath $yuiCommpressorPath
     * @param int $filterUpdateMode
     */
    public function __construct(
        FileFilter $previousFilter,
        $destFile,
        YuiCompressorPath $yuiCommpressorPath,
        $filterUpdateMode = FileFilter::CHECK_EXISTS_MTIME_AND_PREVIOUS
    ) {
        $this->yuiCommpressorPath = $yuiCommpressorPath;
        $this->previousFilter = $previousFilter;
        $this->srcFile = $previousFilter->getFile();
        $this->destFile = clone $destFile; //$this->modifyFilename($this->srcFile);
        $this->filterUpdateMode = $filterUpdateMode;
    }

    /**
     * @param $tempMinifiedFilename
     */
    public function filter($tempMinifiedFilename)
    {
        $originalFilename = $this->srcFile->getPath();
        $jarPath = $this->yuiCommpressorPath->getPath();
        $command = "java -jar $jarPath --line-break 200 $originalFilename -o $tempMinifiedFilename";
        $output = system($command, $returnValue);

        if ($returnValue != 0) {
            @unlink($tempMinifiedFilename);
            $logging = "command is $command <br/>" ;
            $logging .= "curr dir ".getcwd()."<br/>";
            $logging .= "returnValue $returnValue <br/>";
            $logging .= "result is: ";
            $logging .= "Output is: ".$output."<br/>";
            throw new \RuntimeException("Failed to generate minified Javascript: ".$logging);
        }
    }
}
