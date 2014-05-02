<?php




use Weaver\ExtendWeaveInfo;
use Weaver\MethodBinding;
use Weaver\ImplementsWeaveInfo;

//
//$timerWeaveInfo = new ExtendWeaveInfo(
//    'Weaver\Weave\TimerProxy',
//    array(
//        new MethodBinding(
//            'executeQuery',
//            '$this->timer->startTimer($this->queryString);',
//            '$this->timer->stopTimer();'
//        )
//    )
//);
//
//

$cacheWeaveInfo = new ExtendWeaveInfo(
    'Weaver\Weave\CacheProxy',
    
    new MethodBinding(
        'executeQuery',
        '
       $cacheKey = $this->getCacheKey($this->queryString);
       $cachedValue = $this->cache->get($cacheKey);
       
       if ($cachedValue) {
           echo "Result is in cache.\n";
           return $cachedValue;
       }
       ',
        'echo "Result was not in cache\n";
            $this->cache->put($cacheKey, $result);'
    )

);

//
//$weaver = new \Weaver\Weaver();
//
//$weaver->weaveClass(
//       'Example\TestClass',
//           array(
//               $timerWeaveInfo,
//               $cacheWeaveInfo,
//           ),
//           '../generated/',
//           'ClosureTestClassFactory'
//);
