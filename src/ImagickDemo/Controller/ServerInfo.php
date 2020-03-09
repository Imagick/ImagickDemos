<?php

namespace ImagickDemo\Controller;

use SlimAuryn\Response\TwigResponse;
use Tier\InjectionParams;
use Tier\Bridge\JigExecutable;

class ServerInfo
{
    public function renderOPCacheInfo()
    {
//        return JigExecutable::create('admin/opcacheInfo');
        return new TwigResponse('admin/opcacheInfo.html');
    }

    public function serverSettings()
    {
//        return JigExecutable::create('admin/serverSettings');
        return new TwigResponse('admin/serverSettings.html');
    }

    public function createResponse()
    {
//        return JigExecutable::create('admin/fpmStatus');
        return new TwigResponse('admin/fpmStatus.html');
    }
}
