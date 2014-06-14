<?php


namespace Stats;


use Predis\Client as RedisClient;

class AsyncStats {

    use \Intahwebz\Cache\KeyName;

    /**
     * @var \Predis\Client
     */
    private $redisClient;

    /**
     * @var string
     */
    private $redisKey;

    function __construct(RedisClient $redisClient) {
        $this->redisClient = $redisClient;
        $this->redisKey = self::getClassKey();
    }
    
    function getCounterKey() {
        return $this->redisKey.'_counter';
    }
    
    function getGaugeKey() {
        return $this->redisKey.'_gauge';
    }
    
    function recordCount($name, $value, $source, $measureTime = null) {
        $counter = new \Stats\Counter($name, $value, $source, $measureTime);
        $serialized = serialize($counter);
        $this->redisClient->rpush($this->getCounterKey(), [$serialized]);
    }

    function recordGauge($name, $value, $source, $measureTime = null) {
        $counter = new \Stats\Gauge($name, $value, $source, $measureTime);
        $serialized = serialize($counter);
        $this->redisClient->rpush($this->getGaugeKey(), [$serialized]);
    }

    function getCounters($max = 30) {
        $counters = [];
        $number = 0;
        
        while (true) {
            $redisData = $this->redisClient->lpop($this->getCounterKey());

            if (!$redisData) {
                break;
            }

            $counter = unserialize($redisData);
            $counters[] = $counter;
            $number++;
            if ($number >= $max) {
                break;
            }
        }

        return $counters;
    }
}

 