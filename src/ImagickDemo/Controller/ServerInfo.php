<?php

namespace ImagickDemo\Controller;

use Tier\InjectionParams;

class ServerInfo
{
    public function renderOPCacheInfo()
    {
        return createRenderTemplateTier('admin/opcacheInfo');
    }

    public function serverSettings()
    {
        return createRenderTemplateTier('admin/serverSettings');
    }

    public function createResponse()
    {
        return createRenderTemplateTier('admin/fpmStatus');
    }
}
