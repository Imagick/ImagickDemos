<?php

namespace Tier\Caching;

class CachingDisabled implements Caching
{
    public function getHeaders($lastModified)
    {
        return array(
            'Pragma' => 'no-cache',
            'Cache-Control' => 'no-transform, no-cache, no-store',
        );
    }
}
