<?php

namespace Stats;

use ImagickDemo\Config\Librato as LibratoConfig;

class SimpleStats
{
    /**
     * @var \Auryn\Injector
     */
    private $injector;

    private $flushInterval;

    private $sourceName;

    /**
     * @param \Auryn\Injector $injector
     * @param LibratoConfig $libratoConfig
     */
    public function __construct(\Auryn\Injector $injector, LibratoConfig $libratoConfig)
    {
        $this->injector = $injector;
        $this->flushInterval = 10;
        $this->sourceName = $libratoConfig->getStatsSourceName();
    }

    /**
     * Measure the queues - this should probably be in a different class.
     * @return array
     */
    public function getQueueGauges()
    {
        $gauges = [];

        $queuesToCheck = [
            'ImagickDemo\Queue\ImagickTaskQueue',
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

    /**
     *
     */
    public function execute()
    {
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

    /**
     *
     */
    public function run()
    {
        $maxRunTime = 1000;
        $endTime = time() + $maxRunTime;

        while (time() < $endTime) {
            $this->execute();
            sleep(10);
        }
    }
}
