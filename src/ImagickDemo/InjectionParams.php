<?php

declare(strict_types = 1);

namespace ImagickDemo;

use Auryn\Injector;

class InjectionParams
{
    public $shares;
    public $aliases;
    public $classParams;
    public $delegates;
    public $prepares;
    public $namedParams;

    public function __construct(
        array $shares = [],
        array $aliases = [],
        array $delegates = [],
        array $classParams = [],
        array $prepares = [],
        array $namedParams = []
    ) {
        $this->shares = $shares;
        $this->aliases = $aliases;
        $this->delegates = $delegates;
        $this->classParams = $classParams;
        $this->prepares = $prepares;
        $this->namedParams = $namedParams;
    }

    public static function fromParams(array $vars)
    {
        return new static(
            [],
            [],
            [],
            [],
            [],
            $vars
        );
    }
    
    public static function fromSharedObjects($params)
    {
        $instance = new static();
        foreach ($params as $interface => $object) {
            $class = get_class($object);
            if (strcasecmp($class, $interface) !== 0) {
                //Avoid issues where the implementation is being shared
                //by class name rather than interface
                $instance->aliases[$interface] = $class;
            }
            $instance->shares[] = $object;
        }

        return $instance;
    }
    
    public function alias($original, $alias)
    {
        $this->aliases[$original] = $alias;
    }
    
    public function share($classOrInstance)
    {
        $this->shares[] = $classOrInstance;
    }
    
    public function defineNamedParam($paramName, $value)
    {
        $this->namedParams[$paramName] = $value;
    }

    public function delegate($className, $delegate)
    {
        $this->delegates[$className] = $delegate;
    }
    
    public function defineClassParam($className, $params)
    {
        $this->classParams[$className] = $params;
    }
    
    public function prepare($className, $prepareCallable)
    {
        $this->prepares[$className] = $prepareCallable;
    }

    /**
     * @param array $sharedObjects An array where the keys are the interface/classnames to
     * be replaced, and the values are the new classes/objects to be used.
     */
    public function mergeSharedObjects(array $sharedObjects)
    {
        $newAliases = [];
        foreach ($this->aliases as $interface => $implementation) {
            if (array_key_exists($interface, $sharedObjects) === true) {
                if (is_object($sharedObjects[$interface]) === false) {
                    $message = sprintf(
                        "Expected object but received type: %s",
                        gettype($sharedObjects[$interface])
                    );
                    throw new \Auryn\InjectorException($message);
                }
                $newAliases[$interface] = get_class($sharedObjects[$interface]);
                $this->shares[] = $sharedObjects[$interface];
                unset($sharedObjects[$interface]);
            }
            else {
                $newAliases[$interface] = $implementation;
            }
        }

        $this->aliases = $newAliases;

        foreach ($sharedObjects as $interface => $implementation) {
            if (is_object($sharedObjects[$interface]) === false) {
                $message = sprintf(
                    "Expected object but received type: %s",
                    gettype($sharedObjects[$interface])
                );
                throw new \Auryn\InjectorException($message);
            }
            $classname = get_class($implementation);
            if (strcasecmp($classname, $interface) !== 0) {
                //Avoid issues where the object is the same class
                //as the alias
                $this->aliases[$interface]  = $classname;
            }
            $this->shares[] = $sharedObjects[$interface];
        }
    }

    /**
     * @param Injector $injector
     */
    public function addToInjector(Injector $injector)
    {
        foreach ($this->aliases as $original => $alias) {
            $injector->alias($original, $alias);
        }

        foreach ($this->shares as $share) {
            $injector->share($share);
        }
        
        foreach ($this->namedParams as $paramName => $value) {
            $injector->defineParam($paramName, $value);
        }

        foreach ($this->delegates as $className => $callable) {
            $injector->delegate($className, $callable);
        }

        foreach ($this->prepares as $className => $callable) {
            $injector->prepare($className, $callable);
        }

        foreach ($this->classParams as $className => $params) {
            $injector->define($className, $params);
        }
    }
}
