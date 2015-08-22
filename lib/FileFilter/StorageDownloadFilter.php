<?php


namespace Intahwebz\FileFilter;

// TODO - this probably shouldn't be in a standard library.
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

    public function __construct(
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

    public function filter($tmpName)
    {
        $this->storage->downloadFileFromS3Bucket($this->bucket, $this->storageFilename, $tmpName);
    }

    public function srcModified()
    {
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
