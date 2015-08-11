<?php

namespace Tier\Caching;

class CachingRevalidate implements Caching
{
    private $seconds_to_cache;
    private $secondsForCDNToCache;
    
    public function __construct($seconds_to_cache, $secondsForCDNToCache)
    {
        $this->seconds_to_cache = $seconds_to_cache;
        $this->secondsForCDNToCache = $secondsForCDNToCache;
    }
    
    public function getHeaders($lastModifiedTime)
    {
        $expiresTimeStamp = gmdate("D, d M Y H:i:s", time() + $this->seconds_to_cache) . " UTC";

        $headers["Expires"] = $expiresTimeStamp;
        $headers['Last-Modified'] = \getLastModifiedTime($lastModifiedTime);

        // max-age = browser max age
        // s-maxage = intermediate (cache e.g. CDN)
        $headers["Cache-Control"] = sprintf(
            //TODO - this is only appropriate for non-logged in content
            "no-transform,must-revalidate,public,max-age=%s,s-maxage=%s",
            $this->seconds_to_cache,
            $this->secondsForCDNToCache
        );

        return $headers;
    }
}
