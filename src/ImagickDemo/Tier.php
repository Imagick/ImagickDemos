<?php

namespace ImagickDemo;

class Tier
{
    private $callable;
    /**
     * @var InjectionParams
     */
    private $injectionParams;

    // Cannot be typed hinted as callable, as can't reference ['foo', 'bar']
    // as non-static method.
    public function __construct($callable, InjectionParams $injectionParams = null)
    {
        $this->callable = $callable;
        $this->injectionParams = $injectionParams;
    }

    /**
     * @return
     */
    public function getCallable()
    {
        return $this->callable;
    }

    /**
     * @return mixed
     */
    public function getInjectionParams()
    {
        return $this->injectionParams;
    }
}
