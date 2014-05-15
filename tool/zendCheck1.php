<?php


require_once('../vendor/autoload.php');

use Weaver\ExtendWeaveInfo;
use Weaver\MethodBinding;
use Weaver\ImplementsWeaveInfo;

use Zend\Code\Reflection\ClassReflection;
use Zend\Code\Generator\ClassGenerator;

use Zend\Code\Generator\MethodGenerator;

class SomeClass {

    function someFunction() {

        $output = <<< END

        Fix it, fix it!
        Fix it, fix it!
        Fix it, fix it!
END;

    }
}

$reflector = new ClassReflection('SomeClass');
$classGenerator = new ClassGenerator();
$methods = $reflector->getMethods();
$classGenerator->setName("OutputClass");

foreach ($methods as $method) {
    $methodGenerator = MethodGenerator::fromReflection($method);

    $classGenerator->addMethodFromGenerator($methodGenerator);
}

$text = $classGenerator->generate();

echo $text;