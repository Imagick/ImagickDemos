<?php

namespace FileFilter;

use Intahwebz\File;

class NullFilter extends FileFilter
{
    function __construct(File $srcFile)
    {
        $this->srcFile = $srcFile;
        $this->destFile = $this->srcFile;
    }

    function filter($tmpName)
    {
    }

    function process()
    {
        //Has no previous to call.
    }
}

 