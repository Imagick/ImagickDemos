<?php

namespace ImagickDemo\Config;

class APCCacheEnvReader
{
    private $keyPrefix;
    
    public function __construct($keyPrefix = __CLASS__)
    {
        $this->keyPrefix = $keyPrefix;
    }
    
    public function clearCache()
    {
        apc_clear_cache("user");
    }

    private function getKeyName($name)
    {
        return $this->keyPrefix.":".$name;
    }

    public function getValue($name)
    {
        $success = false;
        $keyName = $this->getKeyName($name);
        $value = apc_fetch($keyName, $success);

        if ($success) {
            return $value;
        }

        $value = getenv($name);
        apc_store($keyName, $value);

        return $value;
    }
}
