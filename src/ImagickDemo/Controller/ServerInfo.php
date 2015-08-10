<?php

namespace ImagickDemo\Controller;

use Tier\InjectionParams;


class ServerInfo
{
    public function renderOPCacheInfo()
    {
        $injectionParams = InjectionParams::fromParams([]);

        return getRenderTemplateTier($injectionParams, 'serverInfo');
    }
    
    
    public function serverSettings()
    {
        $injectionParams = InjectionParams::fromParams([]);

        return getRenderTemplateTier($injectionParams, 'serverSettings');
    }
    
    
    public function createResponse()
    {
        $injectionParams = InjectionParams::fromParams([]);

        return getRenderTemplateTier($injectionParams, 'fpmStatus');
    }
}
