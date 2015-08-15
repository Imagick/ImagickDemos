<?php

namespace Tier\Path;

class Path
{
    private $path;

    public function __construct($path)
    {
        if ($path == null) {
            throw new \Exception("Path cannot be null for class ".get_class($this));
        }
        $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param $directory
     * @param $file
     * @return File
     */
    public function getFile($directory, $file, $extension)
    {
        return new File($this->path.'/'.$directory.'/', $file, $extension);
    }

    public function getSafePath($directory, $file = null)
    {
        if (!$directory) {
            throw new \Exception("directory is false, cannot build path from it.");
        }
        if (strlen($directory) < 1) {
            throw new \Exception("directory is zero length, cannot build path from it.");
        }
        $return = $this->path.'/'.$directory.'/';
        
        if ($file != null) {
            $return .= $file;
        }
        
        return $return;
    }
}
