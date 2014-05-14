<?php

use Zend\Code\Reflection\ClassReflection;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\PropertyGenerator;


require_once('../vendor/autoload.php');


class OutputClass
{
    private $x = "I'm not sure why,";

    const x = ' would I ever want this?';

    function foo() {
        echo $this->x;
        echo self::x;
    }
}

$test = new OutputClass();

$test->foo();

$reflector = new ClassReflection('OutputClass');
$classGenerator = ClassGenerator::fromReflection($reflector);
$methods = $reflector->getMethods();

foreach ($methods as $method) {
    $methodGenerator = MethodGenerator::fromReflection($method);
    $classGenerator->addMethodFromGenerator($methodGenerator);
}

$constants = $reflector->getConstants();
foreach ($constants as $name => $value) {
    $classGenerator->addProperty($name, $value, PropertyGenerator::FLAG_CONSTANT);
}

$properties = $reflector->getProperties();
foreach ($properties as $property) {
    $classGenerator->addPropertyFromGenerator($property);
}

$text = $classGenerator->generate();
echo $text;
