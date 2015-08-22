<?php

namespace FileFilter;

use Tier\File;

class ConcatenatingFilter extends FileFilter
{
    private $prependString;

    /**
     * @param \Intahwebz\File $outputFile
     * @param array $jsIncludeArray
     * @param null $prependString - What string to append to files. %FILENAME% will be replaced by the source filename
     * @param int $filterUpdateMode
     * @param $storagePath
     * @param $jsInclude
     * @param $extension
     */
    public function __construct(
        File $outputFile,
        array $jsIncludeArray,
        $prependString = null,
        $filterUpdateMode = FileFilter::CHECK_EXISTS_MTIME_AND_PREVIOUS
    ) {
        $this->jsIncludeArray = $jsIncludeArray;
        $this->prependString = $prependString;
        $this->updateMode = $filterUpdateMode;
        $this->destFile = clone $outputFile; //new File($this->storagePath, $filename);
    }

    /**
     * @return bool
     */
    public function srcModified()
    {
        $destTime = filemtime($this->destFile->getPath());
        foreach ($this->jsIncludeArray as $jsFileToInclude) {
            $sourceTime = filemtime($jsFileToInclude);
            if ($sourceTime > $destTime) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $tempFilename
     * @return \Intahwebz\File|void
     * @throws \Exception
     */
    public function filter($tempFilename)
    {
        $fileHandle = fopen($tempFilename, 'w');

        foreach ($this->jsIncludeArray as $jsFileToInclude) {
            $fileLines = @file($jsFileToInclude);

            if ($fileLines === false) {
                throw new \Exception("Failed to concat file [".$jsFileToInclude."]");
            }
            else {
                foreach ($fileLines as $fileLine) {
                    fwrite($fileHandle, $fileLine);
                }
            }

            fwrite($fileHandle, "\n");
            
            if ($this->prependString) {
                $searchReplace = ["%FILENAME%" => basename($jsFileToInclude)];
                $search = array_keys($searchReplace);
                $replace = array_values($searchReplace);

                $lineToAppend = str_replace($search, $replace, $this->prependString);

                fwrite($fileHandle, $lineToAppend."\n");
            }
        }

        fclose($fileHandle);
    }
}
