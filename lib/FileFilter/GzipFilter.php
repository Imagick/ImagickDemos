<?php

namespace FileFilter;

use Tier\File;

class GzipFilter extends FileFilter
{
    public function __construct(
        FileFilter $previousFilter,
        File $outputFile,
        $filterUpdateMode = FileFilter::CHECK_EXISTS_MTIME_AND_PREVIOUS
    ) {
        $this->previousFilter = $previousFilter;
        $this->srcFile = $previousFilter->getFile();
        $this->destFile = clone $outputFile;
        $this->filterUpdateMode = $filterUpdateMode;
    }

    public function filter($tmpName)
    {

        $safeMinifiedFilename = escapeshellarg($this->srcFile->getPath());
        $safeGzipFilename = escapeshellarg($tmpName);

        $returnVar = 0;

        exec("gzip $safeMinifiedFilename -c > $safeGzipFilename", $output, $returnVar);

        if ($returnVar != 0) {
            throw new \Exception("Error gzipping file $safeMinifiedFilename, $safeGzipFilename. Output: ".$output);
        }
    }
}
