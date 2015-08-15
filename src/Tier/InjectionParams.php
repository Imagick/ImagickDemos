<?php

namespace Tier;

use Auryn\Injector;

class InjectionParams
{
    public $shares;
    public $aliases;
    public $params;
    public $delegates;
    public $prepares;
    public $defines;

    public function __construct(
        array $shares = [],
        array $aliases = [],
        array $delegates = [],
        array $params = [],
        array $prepares = [],
        array $defines = []
    ) {
        $this->shares = $shares;
        $this->aliases = $aliases;
        $this->delegates = $delegates;
        $this->params = $params;
        $this->prepares = $prepares;
        $this->defines = $defines;
    }

    /**
     * @param array $vars
     * @return static
     */
    public static function fromParams(array $vars)
    {
        return new static([], [], [], $vars);
    }

    public function alias($original, $alias)
    {
        $this->aliases[$original] = $alias;
    }
    
    public function share($classOrInstance)
    {
        $this->shares[] = $classOrInstance;
    }
    
    public function defineParam($paramName, $value)
    {
        $this->params[$paramName] = $value;
    }

    public function delegate($className, $delegate)
    {
        $this->delegates[$className] = $delegate;
    }
    
    public function define($className, $params)
    {
        $this->defines[$className] = $params;
    }
    
    /**
     * @return array
     */
    public function getShares()
    {
        return $this->shares;
    }

    /**
     * @return array
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return array
     */
    public function getDelegates()
    {
        return $this->delegates;
    }

    /**
     * @return array
     */
    public function getPrepares()
    {
        return $this->prepares;
    }

    public function getDefines()
    {
        return $this->defines;
    }

    public function mergeMocks($mocks)
    {
        $newAliases = [];

        foreach ($this->aliases as $interface => $implementation) {
            if (array_key_exists($interface, $mocks)) {
                if (is_object($mocks[$interface]) == true) {
                    $this->aliases[$interface] = get_class($mocks[$interface]);
                    $this->shares[] = $mocks[$interface];
                }
                else {
                    $this->aliases[$interface] = $mocks[$interface];
                }
                unset($mocks[$interface]);
            }
            else {
                $newAliases[$interface] = $implementation;
            }
        }

        $this->aliases = $newAliases;
    }
    
    
    /**
     * @param Injector $injector
     * @param InjectionParams $injectionParams
     * @throws \Auryn\InjectorException
     */
    public function addToInjector(Injector $injector)
    {
        foreach ($this->aliases as $original => $alias) {
            $injector->alias($original, $alias);
        }
        
        foreach ($this->shares as $share) {
            $injector->share($share);
        }
        
        foreach ($this->params as $paramName => $value) {
            $injector->defineParam($paramName, $value);
        }
        
        foreach ($this->delegates as $className => $callable) {
            $injector->delegate($className, $callable);
        }
        
        foreach ($this->prepares as $className => $callable) {
            $injector->prepare($className, $callable);
        }
    
        foreach ($this->defines as $className => $params) {
            $injector->define($className, $params);
        }
    }
}
