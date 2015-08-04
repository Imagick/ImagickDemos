<?php

namespace Tier\ResponseBody;

use Arya\Body;

class FileBodyEx implements Body
{
    private $fileSize;
    private $fileHandle;
    private $appendString = '';
    
    private $options = [];

    public function __construct($path, $appendString)
    {
        if (!is_string($path)) {
            throw new \RuntimeException(
                sprintf('FileBody path must be a string filesystem path; %s specified', gettype($path))
            );
        } elseif (!is_readable($path)) {
            throw new \RuntimeException(
                sprintf('FileBody path is not readable: %s', $path)
            );
        } elseif (!is_file($path)) {
            throw new \RuntimeException(
                sprintf('FileBody path is not a file: %s', $path)
            );
        }

        $this->fileHandle = @fopen($path, 'rb');
        
        if (!$this->fileHandle) {
            throw new \RuntimeException(
                sprintf('FileBody could not open file for reading: %s', $path)
            );
        }

        $statInfo = fstat($this->fileHandle);
        
        if (!array_key_exists('size', $statInfo)) {
            throw new \RuntimeException(
                sprintf('FileBody could not determine file size from fstat: %s', $path)
            );
        }

        $this->fileSize = $statInfo['size'];
        $this->appendString = $appendString;
    }

    public function __invoke()
    {
        $this->send();
    }

    public function send()
    {
        if (@fpassthru($this->fileHandle) === false) {
            throw new \RuntimeException(
                sprintf("FileBody could not fpassthru filehandle")
            );
        }
        
        echo $this->appendString;
    }

    /**
     * @TODO Parse content-type from file extension
     * @TODO Add caching headers
     */
    public function getHeaders()
    {
        return [
            'Content-Length' => $this->fileSize + strlen($this->appendString)
        ];
    }

    /**
     * @TODO Add ETag options
     */
    public function setOptions()
    {
    }


    public function getFileHandle()
    {
        return $this->fileHandle;
    }
}