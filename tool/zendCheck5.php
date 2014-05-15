<?php

use Zend\Code\Reflection\ClassReflection;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\PropertyGenerator;


require_once('../vendor/autoload.php');



class TestClass {
    
    private $foo =  \Imagick::ALPHACHANNEL_OPAQUE;
}


$reflection = new ClassReflection('TestClass');
$classGenerator = ClassGenerator::fromReflection($reflection);
//$methods = $reflection->getMethods();

//foreach ($methods as $method) {
//    $methodGenerator = MethodGenerator::fromReflection($method);
//    $classGenerator->addMethodFromGenerator($methodGenerator);
//
////    echo $method->getBody();
//}

//$constants = $reflection->getConstants();
//foreach ($constants as $name => $value) {
//    $classGenerator->addProperty($name, $value, PropertyGenerator::FLAG_CONSTANT);
//}

//$properties = $reflection->getProperties();
//foreach ($properties as $property) {
//    $propertyGenerator = PropertyGenerator::fromReflection($property);
//    $classGenerator->addPropertyFromGenerator($propertyGenerator);
//}

$text = $classGenerator->generate();
echo $text;
