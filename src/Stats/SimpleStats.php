<?php

namespace Stats;

use ImagickDemo\Config\Librato as LibratoConfig;
use Stats\AsyncStats;
use ImagickDemo\Queue\ImagickTaskQueue;
use Stats\Librato;

class SimpleStats
{
    private $flushInterval;

    private $sourceName;

    /**
     * @var \Stats\AsyncStats
     */
    private $asyncStats;

    /**
     * @var ImagickTaskQueue
     */
    private $imagickTaskQueue;

    /**
     * @var Librato
     */
    private $librato;

    public function __construct(
        LibratoConfig $libratoConfig,
        AsyncStats $asyncStats,
        ImagickTaskQueue $imagickTaskQueue,
        Librato $librato
    ) {
        $this->asyncStats = $asyncStats;
        $this->flushInterval = 10;
        $this->sourceName = $libratoConfig->getStatsSourceName();
        $this->imagickTaskQueue = $imagickTaskQueue;
        $this->librato = $librato;
    }

    /**
     * Measure the queues - this should probably be in a different class.
     * @return array
     */
    public function getQueueGauges()
    {
        $gauges = [];

        // TODO - we are probably going to have more than one queue at some point.
        $taskQueue = $this->imagickTaskQueue;
        /** @var $taskQueue \ImagickDemo\Queue\TaskQueue */
        $gauge = new Gauge(
            $taskQueue->getName(),
            $taskQueue->getQueueCount(),
            $this->sourceName
        );

        $gauges[] = $gauge;

        return $gauges;
    }

    /**
     *
     */
    public function execute()
    {
        $gauges = [];
        $counters = [];

        $gauges = array_merge($gauges, $this->getQueueGauges());
        $counters = array_merge($counters, $this->asyncStats->getCounters());

        $requiredTimers = [
            \ImagickDemo\Queue\ImagickTaskRunner::EVENT_IMAGE_GENERATED,
            \ImagickDemo\Queue\ImagickTaskRunner::EVENT_PAGE_GENERATED,
        ];

        $gauges = array_merge($gauges, $this->asyncStats->summariseTimers($requiredTimers));

        if (count($counters) || count($gauges)) {
            $this->librato->send($gauges, $counters);
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
