<?php

namespace Tier\ResponseBody;

use Tier\Caching\Caching;

class FileResponseIMFactory
{
    private $caching;
    
    public function __construct(Caching $caching)
    {
        $this->caching = $caching;
    }

    public function create(
        $fileNameToServe,
        $contentType,
        $headers = []
    ) {
        return new FileResponseIM(
            $this->caching,
            $fileNameToServe,
            $contentType,
            $headers
        );
    }
}
