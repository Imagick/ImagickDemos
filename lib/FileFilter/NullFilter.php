<?php

namespace FileFilter;

use Intahwebz\File;

class NullFilter extends FileFilter
{
    public function __construct(File $srcFile)
    {
        $this->srcFile = $srcFile;
        $this->destFile = $this->srcFile;
    }

    public function filter($tmpName)
    {
    }

    public function process()
    {
        //Has no previous to call.
    }
}
