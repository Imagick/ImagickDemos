<?php

namespace Tier\ResponseBody;

use Arya\Response;

class FileBodyGenerator
{
    private $response;
    
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
