<?php





namespace FirstNamespace {
    
    class DependencyClass {
        
    }
}

namespace SecondNamespace {
    
    class TestClass {

        function someFunction(\FirstNamespace\DependencyClass $foo) {
        }
    }
}

namespace {

    require_once('../vendor/autoload.php');

use Weaver\ExtendWeaveInfo;
use Weaver\MethodBinding;
use Weaver\ImplementsWeaveInfo;

use Zend\Code\Reflection\ClassReflection;
use Zend\Code\Generator\ClassGenerator;

use Zend\Code\Generator\MethodGenerator;




$reflector = new ClassReflection('SecondNamespace\TestClass');
$classGenerator = ClassGenerator::fromReflection($reflector);

//$methods = $reflector->getMethods();
//
//$classGenerator->setName("OutputClass");

//foreach ($methods as $method) {
//    $methodGenerator = MethodGenerator::fromReflection($method);
//
//    $classGenerator->addMethodFromGenerator($methodGenerator);
//}
//
$text = $classGenerator->generate();

echo $text;

}