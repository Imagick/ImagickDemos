<?php

use Zend\Code\Reflection\ClassReflection;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;



require_once('../vendor/autoload.php');


class OutputClass
{

    /*
    public function thisIsOkay()
    {
        if (true) {
            echo "true"; //space between bracket on next line and method closing bracket
        }

    }

    public function thisIsOkay2()
    {
        if (true) {
            echo "true";
        }
        //Don't eat me
    }

    public function thisIsOkay3()
    {
        if (true) {
            echo "true"; //next line has spaces after bracket
        } 
    } 
    */

    public function thisIsBroken()
    {
        if (true) {
            echo "true"; //Next line has two brackets
        }
    }
}

$reflector = new ClassReflection('OutputClass');
$classGenerator = new ClassGenerator();
$methods = $reflector->getMethods();

$classGenerator->setName("OutputClass");

foreach ($methods as $method) {
    $methodGenerator = MethodGenerator::fromReflection($method);
    $classGenerator->addMethodFromGenerator($methodGenerator);
}

$text = $classGenerator->generate();
echo $text;
