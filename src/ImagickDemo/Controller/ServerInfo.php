<?php

namespace ImagickDemo\Controller;

use Tier\InjectionParams;
use Tier\Bridge\JigExecutable;

class ServerInfo
{
    public function renderOPCacheInfo()
    {
        return JigExecutable::create('admin/opcacheInfo');
    }

    public function serverSettings()
    {
        return JigExecutable::create('admin/serverSettings');
    }

    public function createResponse()
    {
        return JigExecutable::create('admin/fpmStatus');
    }
}
