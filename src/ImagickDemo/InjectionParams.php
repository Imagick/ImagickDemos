<?php


namespace ImagickDemo;


class InjectionParams
{

    public $shares;
    public $aliases;
    public $params;
    public $delegates;
    
    
    public function __construct(array $shares, array $aliases, array $params, array $delegates)
    {
        $this->shares = $shares;
        $this->aliases = $aliases;
        $this->params = $params;
        $this->delegates = $delegates;
    }

    /**
     * @param array $vars
     */
    public static function fromParams(array $vars)
    {
        return new static([], [], $vars, []);
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
        $this->params[$className] = $delegate; 
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
}

