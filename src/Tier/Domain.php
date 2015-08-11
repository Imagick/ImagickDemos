<?php

namespace Tier;

class Domain
{
    private $canonicalDomain;
    
    private $cdnNamePattern;
    
    private $numberCDNNames;

    public function __construct($canonicalDomain, $cdnNamePattern, $numberCDNNames)
    {
        $this->canonicalDomain = $canonicalDomain;
        $this->cdnNamePattern = $canonicalDomain;
        $this->numberCDNNames = $numberCDNNames;
    }
    
    public function getCanonicalDomain()
    {
        return $this->canonicalDomain;
    }
    
    public function getContentDomain($contentIndex)
    {
        $cdnIndex = $contentIndex % $this->numberCDNNames;
        
        return sprintf($this->cdnNamePattern, $cdnIndex);
    }
}
