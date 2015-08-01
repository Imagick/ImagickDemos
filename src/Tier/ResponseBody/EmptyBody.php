<?php

namespace Tier\ResponseBody;

use Arya\Body;

class EmptyBody implements Body
{
    public function __construct()
    {
    }

    public function __toString()
    {
        return '';
    }
    
    public function __invoke()
    {
        return '';
    }

    public function getHeaders()
    {
        return [];
    }
}
