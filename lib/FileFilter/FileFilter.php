<?php

namespace FileFilter;

use Tier\File;

function correctUmask($filename)
{
    $umask = umask();
    $correctMode = ( 0777 - $umask);

    return chmod($filename, $correctMode);
}

function saveTmpFile($tmpName, $destFilename)
{
    renameMultiplatform($tmpName, $destFilename);
    correctUmask($destFilename);
    //@unlink($tmpName);
}

abstract class FileFilter
{
    const ALWAYS_UPDATE     = 0x1;
    const NEVER_UPDATE      = 0x2;
    const CHECK_MTIME       = 0x4;
    const CHECK_EXISTS      = 0x8;
    const CHECK_PREVIOUS    = 0x10;

    const CHECK_MTIME_AND_PREVIOUS = 0x14;
    const CHECK_EXISTS_MTIME_AND_PREVIOUS = 0x1c;
    const CHECK_EXISTS_AND_PREVIOUS = 0x18;
    
    /**
     * @var FileFilter
     *
     */
    protected $previousFilter;
    
    /**
     * @var File
     */
    public $srcFile;


    /**
     * @var File
     */
    protected $destFile;


    protected $updateMode = self::CHECK_EXISTS_MTIME_AND_PREVIOUS;

    /**
     * @internal param \Intahwebz\File $file
     * @param $tmpName
     * @return File
     */
    abstract public function filter($tmpName);
    
    public function srcModified()
    {
        $destTime = @filemtime($this->destFile->getPath());
        $sourceTime = @filemtime($this->srcFile->getPath());

        if ($sourceTime > $destTime) {
            return true;
        }

        return false;
    }
    
    /**
     * @return bool
     */
    public function requiresUpdate()
    {
        if ($this->updateMode & FileFilter::ALWAYS_UPDATE) {
            return true;
        }

        if ($this->updateMode & FileFilter::CHECK_EXISTS ||
            $this->updateMode & FileFilter::CHECK_MTIME) {
            if (file_exists($this->destFile->getPath()) == false) {
                return true;
            }
        }

        if ($this->updateMode & FileFilter::CHECK_MTIME) {
            if ($this->srcModified() == true) {
                return true;
            }
        }

        if ($this->updateMode & FileFilter::CHECK_PREVIOUS) {
            if ($this->previousFilter != null) {
                return $this->previousFilter->requiresUpdate();
            }
        }

        return false;
    }

    /**
     * @return File
     */
    public function getFile()
    {
        return $this->destFile;
    }

    /**
     * @return File
     */
    public function process()
    {
        if ($this->requiresUpdate() == true) {
            if ($this->previousFilter != null) {
                $this->previousFilter->process();
            }
            $tmpName = tempnam(sys_get_temp_dir(), "filefilter_");
            $this->filter($tmpName);
            saveTmpFile($tmpName, $this->destFile->getPath());
        }
    }
}
