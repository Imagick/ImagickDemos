<?php

use Zend\Code\Reflection\ClassReflection;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\PropertyGenerator;


require_once('../vendor/autoload.php');



class ObjectCache {
    
}


class CacheProxy {

    /**
     * @var \Intahwebz\ObjectCache
     */
    private $cache;

    function __construct(ObjectCache $cache) {
        $this->cache = $cache;
    }

    function getCacheKey() {
        $args = func_get_args();

        $cacheKey = '';

        foreach($args as $arg) {
            if (is_array($arg)) {
                foreach ($arg as $argElement) {
                    $cacheKey = hash("sha256", $cacheKey.$argElement);
                }
            }
            else {
                $cacheKey = hash("sha256", $cacheKey.$arg);
            }
            //blah
        }

        return $cacheKey;
    }

//    //TODO - would it be better to define the binding like this?
//    function __prototype() {
//        $cacheKey = $this->getCacheKey($queryString);
//        $cachedValue = $this->cache->get($cacheKey);
//
//        if ($cachedValue) {
//            return $cachedValue;
//        }
//        $result = parent::__prototype();
//        $this->cache->put($cacheKey, $result);
//        return $result;
//    }

}


$reflection = new ClassReflection('CacheProxy');
$classGenerator = ClassGenerator::fromReflection($reflection);
//$methods = $reflection->getMethods();

//foreach ($methods as $method) {
////    $methodGenerator = MethodGenerator::fromReflection($method);
////    $classGenerator->addMethodFromGenerator($methodGenerator);
//
//    echo $method->getBody();
//}

//$constants = $reflector->getConstants();
//foreach ($constants as $name => $value) {
//    $classGenerator->addProperty($name, $value, PropertyGenerator::FLAG_CONSTANT);
//}
//
//$properties = $reflector->getProperties();
//foreach ($properties as $property) {
//    $classGenerator->addPropertyFromGenerator($property);
//}

//$text = $classGenerator->generate();
//echo $text;
