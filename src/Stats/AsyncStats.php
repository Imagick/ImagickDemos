<?php

namespace Stats;

use Predis\Client as RedisClient;
use ImagickDemo\Config\Librato as LibratoConfig;

class AsyncStats
{
    use \Intahwebz\Cache\KeyName;

    /**
     * @var \Predis\Client
     */
    private $redisClient;

    /**
     * @var string
     */
    private $redisKey;

    public function __construct(RedisClient $redisClient, LibratoConfig $libratoConfig)
    {
        $this->redisClient = $redisClient;
        $this->redisKey = self::getClassKey();
        $this->sourceName = $libratoConfig->getStatsSourceName();
    }
    
    public function getCounterKey()
    {
        return $this->redisKey.'_counter';
    }
    
    public function getGaugeKey()
    {
        return $this->redisKey.'_gauge';
    }

    public function getTimerKey()
    {
        return $this->redisKey.'_timer';
    }

    public function recordCount($name, $value, $measureTime = null)
    {
        $counter = new \Stats\Counter($name, $value, $this->sourceName, $measureTime);

        $serialized = serialize($counter);
        $this->redisClient->rpush($this->getCounterKey(), [$serialized]);
    }

    public function recordTime($name, $value, $measureTime = null)
    {
        $counter = new \Stats\Timer($name, $value, $this->sourceName, $measureTime);
        $serialized = serialize($counter);
        $this->redisClient->rpush($this->getTimerKey(), [$serialized]);
        //TODO - check errors
    }

    public function recordGauge($name, $value, $measureTime = null)
    {
        $counter = new \Stats\Gauge($name, $value, $this->sourceName, $measureTime);
        $serialized = serialize($counter);
        $this->redisClient->rpush($this->getGaugeKey(), [$serialized]);
    }

    /**
     * @param int $max
     * @return Timer[]
     */
    public function getTimers($max = 300)
    {
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
    public function summariseTimers($requiredTimers = array())
    {
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
    public function getCounters($max = 30)
    {
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
