<?php

declare(strict_types = 1);


class A {

    protected $foo = "I am class A";

}

class B
{
    public $foo;
}


$b = new B();

var_dump($b->foo);