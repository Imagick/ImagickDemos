<?php

namespace Tier\ResponseBody;

use Arya\Response;

class FileResponseCreator
{
    private $response;
    
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
    
    public function create($filename, $contentType, $appendString)
    {
        $this->response->addHeader('Content-Type', $contentType);
        $fileBody = new FileBodyEx($filename, $appendString);
        
        //$this->response->addHeader('Content-Encoding', 'gzip');

        return $fileBody;
    }
}
