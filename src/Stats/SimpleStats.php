<?php

namespace Stats;


class SimpleStats {

    /**
     * @var \Auryn\Provider
     */
    private $injector;

    private $flushInterval;
    
    private $sourceName;
    
    function __construct(\Auryn\Provider $injector, $statsSourceName) {
        $this->injector = $injector;
        $this->flushInterval = 10;
        $this->sourceName = $statsSourceName;
    }

    function getQueueGauges() {
        $gauges = [];
        
        $queuesToCheck = [
            'ImagickDemo\Queue\RedisTaskQueue',
        ];

        foreach ($queuesToCheck as $queueName) {
            $taskQueue = $this->injector->make($queueName);
            /** @var $taskQueue \ImagickDemo\Queue\TaskQueue */
            $gauge = new Gauge(
                $taskQueue->getName(),
                $taskQueue->getQueueCount(),
                $this->sourceName
            );

            $gauges[] = $gauge;
        }

        return $gauges;
    }
    
    
    function execute() {

        $gauges = [];
        $counters = [];

        $asyncStats = $this->injector->make('Stats\AsyncStats');

        $gauges = array_merge($gauges, $this->getQueueGauges());
        $counters = array_merge($counters, $asyncStats->getCounters());
        
        $requiredTimers = [
            \ImagickDemo\Queue\ImagickTaskRunner::event_imageGenerated,
            \ImagickDemo\Queue\ImagickTaskRunner::event_pageGenerated,
        ];

        $gauges = array_merge($gauges, $asyncStats->summariseTimers($requiredTimers));

        if (count($counters) || count($gauges)) {
            $librato = $this->injector->make('Stats\Librato');
            $librato->send($gauges, $counters);
        }
    }


    function run() {
        $maxRunTime = 1000;
        $endTime = time() + $maxRunTime;

        while (time() < $endTime) {
            $this->execute();
            sleep(10);
        }
    }
    
    
    
    
    
    
}

