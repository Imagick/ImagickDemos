<?php

namespace Tier\ResponseBody;

use Arya\Body;
use Tier\Caching\Caching;
use Tier\TierException;

class FileResponseIM implements Body
{
    private $fileNameToServe;
    private $headers = [];

    private $caching;

    public function __construct(
        Caching $caching,
        $fileNameToServe,
        $contentType,
        $headers = []
    ) {
        $this->caching = $caching;
        if (is_readable($fileNameToServe) === false) {
            throw new \Exception("File $fileNameToServe isn't readable, can't serve it.");
        }
        $this->fileNameToServe = $fileNameToServe;
        $this->headers = $this->caching->getHeaders(filemtime($fileNameToServe));

        if ($contentType) {
            $this->headers["Content-Type"] = $contentType;
        }

        $fileSize = @filesize($this->fileNameToServe);
        if ($fileSize === false) {
            throw new TierException("Could not determine file size of ".$this->fileNameToServe);
        }

        $this->headers['Content-Length'] = $fileSize;

        foreach ($headers as $key => $value) {
            $this->headers[$key] = $value;
        }
    }
    
    /**
     * Responsible for outputting entity body data to STDOUT
     */
    public function __invoke()
    {
        $result = @readfile($this->fileNameToServe);

        if ($result === false) {
            throw new \Exception("Failed to readfile [$this->fileNameToServe] for serving.");
        }
    }

    /**
     * Return an optional array of headers to be sent prior to entity body output
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
