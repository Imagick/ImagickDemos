<?php

namespace ImagickDemo\Controller;

use Tier\InjectionParams;

class ServerInfo
{
    public function renderOPCacheInfo()
    {
        $injectionParams = InjectionParams::fromParams([]);

        return getRenderTemplateTier($injectionParams, 'admin/opcacheInfo');
    }

    public function serverSettings()
    {
        $injectionParams = InjectionParams::fromParams([]);

        return getRenderTemplateTier($injectionParams, 'admin/serverSettings');
    }
    
    
    public function createResponse()
    {
        $injectionParams = InjectionParams::fromParams([]);

        return getRenderTemplateTier($injectionParams, 'admin/fpmStatus');
    }
}
