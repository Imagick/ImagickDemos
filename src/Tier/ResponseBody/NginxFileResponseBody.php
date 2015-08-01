<?php


namespace Tier\ResponseBody;

use Arya\Body;

class NginxFileResponseBody
{
//TODO - extract just FileBody bits.
//
//    private $fileNameToServe;
//
//    private $headers = [];
//
//    //mimetype could be optional param
//    //header('Content-Type:' . $mimeType);
//    function __construct($fileNameToServe) {
//        $this->fileNameToServe = $fileNameToServe;
//        $this->setCachingHeaders(3600);
//    }
//
//    function setCachingHeaders($seconds_to_cache) {
//        ///** @noinspection PhpUnusedParameterInspection */  $secondsForCDNToCache = false
//        $currentTimeStamp = gmdate("D, d M Y H:i:s", time()) . " UTC";
//        $timeStamp = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " UTC";
//
//        //	if($secondsForCDNToCache === false){
//        //		$secondsForCDNToCache = intval($seconds_to_cache / 10);
//        //	}
//
//        $this->setHeader("Date", $currentTimeStamp);
//        //header("HTTP1/0 200 Ok");
//        //header("Content-Type: $mimeType");
//        //header("Date: $currentTimeStamp");
//
//        //TODO - does this get cached by CDN.
//        //header("Expires: $timeStamp");
//        $this->setHeader("Expires", $timeStamp);
//        //header("Pragma: cache");
//
//        //header("Expires: -1");
//        $this->setHeader("Cache-Control", "must-revalidate, private");
//
//        //header("Cache-Control: max-age=$seconds_to_cache, s-maxage=$secondsForCDNToCache");
//        //max-age = browser max age
//        //s-maxage = intermediate (cache e.g. CDN)
//    }
//
//    function setHeader($type, $value) {
//        $this->headers[$type] = $value;
//    }
//
//    function sendHeaders() {
//        $lastModifiedTime = filemtime($this->fileNameToServe);
//        $fileSize = filesize($this->fileNameToServe);
//
//        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) &&
//            strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $lastModifiedTime
//        ) {
//            header('HTTP/1.0 304 Not Modified');
//            exit;
//        }
//
//        header('Content-Length: ' . $fileSize);
//        header('Last-Modified: ' . \getLastModifiedTime($lastModifiedTime), true);
//
//        foreach ($this->headers as $type => $value) {
//            header("$type: $value");
//        }
//    }
//
//    
//    function send() {
//        $this->sendHeaders();
//        $this->sendNginxAccel();
//    }
//
//
//    function sendNginxAccel() {
//        //if($alreadyGzip == false && defined('X-ACCEL-REDIRECT') == true && constant('X-ACCEL-REDIRECT') == true){
//        //if (defined('X_ACCEL_REDIRECT') == true && constant('X_ACCEL_REDIRECT') == true) {
//            //Todo - this is bad code, it is hard-linking two separate variables
//        //            echo "$fileNameToServe <br/> ".$this->storagePath."/cache <br/>";
//            //TODO - this is a crap bug fix.
//        //$filenameToProxy = str_replace($this->storagePath . "cache", '/protected_files', $fileNameToServe);
//        //$filenameToProxy = str_replace($this->storagePath . "/cache", '/protected_files', $filenameToProxy);
//            //TODO - check  that protected_files is at position zero, or proxy the file normally otherwise.
//            //http://wiki.nginx.org/X-accel
//        //            echo "$filenameToProxy";
//        //            exit(0);
//        
//        //sendProxyHeaders($mimeType, $seconds_to_cache);
//        //header("X-Accel-Redirect: " . $filenameToProxy);
//        exit(0);
//    }
//}
}
