<?php

namespace Tier\ResponseBody;

use Arya\Body;

class FileResponseIM implements Body
{
    private $fileNameToServe;
    private $headers = [];

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

    public function __construct(
        $fileNameToServe,
        $contentType,
        $headers = []
    ) {
        if (is_readable($fileNameToServe) === false) {
            throw new \Exception("File $fileNameToServe isn't readable, can't serve it.");
        }
        $this->fileNameToServe = $fileNameToServe;
        //TODO - inject this through config
        $seconds_to_cache = 7 * 24 * 3600;
        
        //	if($secondsForCDNToCache === false){
        //		$secondsForCDNToCache = intval($seconds_to_cache / 10);
        //	}

        $this->headers["Date"] = gmdate("D, d M Y H:i:s", time()) . " UTC";

        $this->headers["Expires"] = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " UTC";
        $this->headers["Cache-Control"] = "must-revalidate, private";

        //header("Cache-Control: max-age=$seconds_to_cache, s-maxage=$secondsForCDNToCache");
        //max-age = browser max age
        //s-maxage = intermediate (cache e.g. CDN)
        
        if ($contentType) {
            $this->headers["Content-Type"] = $contentType;
        }
        
        $lastModifiedTime = filemtime($this->fileNameToServe);
        $fileSize = filesize($this->fileNameToServe);

        $this->headers['Content-Length'] = $fileSize;
        $this->headers['Last-Modified'] = \getLastModifiedTime($lastModifiedTime);
        
        foreach ($headers as $key => $value) {
            $this->headers[$key] = $value;
        }
    }
}
