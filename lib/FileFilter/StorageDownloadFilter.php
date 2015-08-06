<?php


namespace Intahwebz\FileFilter;

use Intahwebz\Storage\Storage;
use Intahwebz\File;

class StorageDownloadFilter extends FileFilter
{
    /**
     * @var \Intahwebz\Storage\Storage
     */
    private $storage;
    
    private $storageFilename;
    
    private $bucket;

    function __construct(
        Storage $storage, 
        File $destFile,
        $bucket, 
        $storageFilename,
        $filterUpdateMode = FileFilter::CHECK_EXISTS_AND_PREVIOUS
    ) {
        $this->storage = $storage;
        $this->filterUpdateMode = $filterUpdateMode;
        $this->destFile = $destFile;
        $this->bucket = $bucket;
        $this->storageFilename = $storageFilename;
    }

    function filter($tmpName) {
        $this->storage->downloadFileFromS3Bucket($this->bucket, $this->storageFilename, $tmpName);
    }

    function srcModified() {
        $destPath = $this->destFile->getPath();
        
        if (@file_exists($destPath) == false) {
            return true;
        }

        if (@filesize($destPath) == 0) {
            unlink($destPath);
            return true;
        }

        return false;   
    }
}

 