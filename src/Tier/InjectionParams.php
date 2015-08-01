<?php


namespace Tier;

class InjectionParams
{
    public $shares;
    public $aliases;
    public $params;
    public $delegates;
    public $prepares;

    public function __construct(
        array $shares = [],
        array $aliases = [],
        array $delegates = [],
        array $params = [],
        array $prepares = []
    ) {
        $this->shares = $shares;
        $this->aliases = $aliases;
        $this->delegates = $delegates;
        $this->params = $params;
        $this->prepares = $prepares;
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
}
