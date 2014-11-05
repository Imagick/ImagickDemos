<?php

namespace ImagickDemo\Response;

class FileResponse implements \ImagickDemo\Response\Response {

    private $fileNameToServe;
    private $headers = [];

    function __construct($fileNameToServe, $contentType) {
        if (is_readable($fileNameToServe) === false) {
            throw new \Exception("File $fileNameToServe isn't readable, can't serve it.");
        }
        $this->fileNameToServe = $fileNameToServe;
        //TODO - inject this through config
        $this->setCachingHeaders(7 * 24 * 3600);
        
        if ($contentType) {
            $this->setHeader("Content-Type", $contentType);
        }
    }

    function setCachingHeaders($seconds_to_cache) {
        ///** @noinspection PhpUnusedParameterInspection */  $secondsForCDNToCache = false
        $currentTimeStamp = gmdate("D, d M Y H:i:s", time()) . " UTC";
        $timeStamp = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " UTC";

        //	if($secondsForCDNToCache === false){
        //		$secondsForCDNToCache = intval($seconds_to_cache / 10);
        //	}

        $this->setHeader("Date", $currentTimeStamp);
        //header("HTTP1/0 200 Ok");
        //header("Content-Type: $mimeType");
        //header("Date: $currentTimeStamp");

        //TODO - does this get cached by CDN.
        //header("Expires: $timeStamp");
        $this->setHeader("Expires", $timeStamp);
        //header("Pragma: cache");

        //header("Expires: -1");
        $this->setHeader("Cache-Control", "must-revalidate, private");

        //header("Cache-Control: max-age=$seconds_to_cache, s-maxage=$secondsForCDNToCache");
        //max-age = browser max age
        //s-maxage = intermediate (cache e.g. CDN)
    }

    function setHeader($type, $value) {
        $this->headers[$type] = $value;
    }

    function send() {
        $this->sendHeaders();
        $this->sendFile();
    }

    function sendHeaders() {
        $lastModifiedTime = filemtime($this->fileNameToServe);
        $fileSize = filesize($this->fileNameToServe);

        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) &&
            strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $lastModifiedTime
        ) {
            header('HTTP/1.0 304 Not Modified');
            exit;
        }

        header('Content-Length: ' . $fileSize);
        header('Last-Modified: ' . \getLastModifiedTime($lastModifiedTime), true);

        foreach ($this->headers as $type => $value) {
            header("$type: $value");
        }
    }

    function sendFile() {
        $result = @readfile($this->fileNameToServe);

        if($result === false){
            throw new \Exception("Failed to readfile [$this->fileNameToServe] for serving.");
        }
    }
}

 