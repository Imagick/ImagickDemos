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

    function __construct(RedisClient $redisClient, $statsSourceName) {
        $this->redisClient = $redisClient;
        $this->redisKey = self::getClassKey();
        $this->sourceName = $statsSourceName;
    }
    
    function getCounterKey() {
        return $this->redisKey.'_counter';
    }
    
    function getGaugeKey() {
        return $this->redisKey.'_gauge';
    }

    function getTimerKey() {
        return $this->redisKey.'_timer';
    }

    function recordCount($name, $value, $measureTime = null) {
        $counter = new \Stats\Counter($name, $value, $this->sourceName, $measureTime);

        $serialized = serialize($counter);
        $this->redisClient->rpush($this->getCounterKey(), [$serialized]);
    }

    function recordTime($name, $value, $measureTime = null) {
        $counter = new \Stats\Timer($name, $value, $this->sourceName, $measureTime);
        $serialized = serialize($counter);
        $this->redisClient->rpush($this->getTimerKey(), [$serialized]);
        //TODO - check errors
    }

    function recordGauge($name, $value, $measureTime = null) {
        $counter = new \Stats\Gauge($name, $value, $this->sourceName, $measureTime);
        $serialized = serialize($counter);
        $this->redisClient->rpush($this->getGaugeKey(), [$serialized]);
    }

    /**
     * @param int $max
     * @return Timer[]
     */
    function getTimers($max = 300) {
        $counters = [];
        $number = 0;

        while (true) {
            $redisData = $this->redisClient->lpop($this->getTimerKey());

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


    /**
     * @param array $requiredTimers
     * @return SummaryTimer[]
     */
    function summariseTimers($requiredTimers = array()) {
        
        /** @var  $summaryCounters SummaryTimer[] */
        $summaryCounters = [];
        $timers = $this->getTimers();

        foreach ($requiredTimers as $requiredTimerName) {
            $summaryCounters[$requiredTimerName] = new SummaryTimer($requiredTimerName, $this->sourceName);
        }
        
        
        foreach ($timers as $timer) {
            $name = $timer->getName();
            if (array_key_exists($name, $summaryCounters) === false) {
                $summaryCounters[$name] = new SummaryTimer($name, $this->sourceName);
            }

            $summaryCounters[$name]->addTiming($timer);
        }

        return $summaryCounters;
    }


    /**
     * @param int $max
     * @return array
     */
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

 