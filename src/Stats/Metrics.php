<?php

namespace Stats;

class Metrics
{

    /**
     * @var Counter[]
     */
    private $counters = [];

    /**
     * @var Timer[]
     */
    private $timers = [];

    public function getCounters()
    {
        return $this->counters;
    }

    public function getTimers()
    {
        return $this->timers;
    }
}
