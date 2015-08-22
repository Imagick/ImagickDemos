<?php


namespace FileFilter;

use Tier\Path;

class YuiCompressorPath
{
    private $path;

    public function __construct($yuicompressorPath)
    {
        $this->path = $yuicompressorPath;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
