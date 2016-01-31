<?php

namespace ImagickDemo\Controller;

use Tier\InjectionParams;

use Tier\Tier;

class ServerInfo
{
    public function renderOPCacheInfo()
    {
        return Tier::getRenderTemplateTier('admin/opcacheInfo');
    }

    public function serverSettings()
    {
        return Tier::getRenderTemplateTier('admin/serverSettings');
    }

    public function createResponse()
    {
        return Tier::getRenderTemplateTier('admin/fpmStatus');
    }
}
