<?php

namespace Tier;

/**
 * Class Tier
 *
 * Defines a Tier of the application. The information it contains is used in the following
 * order:
 *
 * i) The injection params are added to the injector
 * ii) The setup callable is called.
 * iii) The tier callable is called.
 *
 * @package Tier
 */
class Tier
{
    /**
     * @var callable - callable as well as ['classname', 'nonStaticMethodName']
     */
    private $tierCallable;

    /**
     * @var callable - callable as well as ['classname', 'nonStaticMethodName']
     */
    private $setupCallable;
    
    /**
     * @var InjectionParams
     */
    private $injectionParams;

    // Cannot be typed hinted as callable, as can't reference ['foo', 'bar']
    // as non-static method.
    public function __construct(
        $nextCallable,
        InjectionParams $injectionParams = null,
        $setupCallable = null
    ) {
        $this->tierCallable = $nextCallable;
        $this->injectionParams = $injectionParams;
        $this->setupCallable = $setupCallable;
    }

    /**
     * @return mixed
     */
    public function getTierCallable()
    {
        return $this->tierCallable;
    }

    /**
     * @return mixed
     */
    public function getSetupCallable()
    {
        return $this->setupCallable;
    }

    /**
     * @return InjectionParams
     */
    public function getInjectionParams()
    {
        return $this->injectionParams;
    }
}
