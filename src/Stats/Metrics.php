<?php


namespace Stats;


class Metrics {

    /**
     * @var Counter[]
     */
    private $counters = [];

    /**
     * @var Timer[]
     */
    private $timers = [];

    function getCounters() {
        return $this->counters;
    }
    
    function getTimers() {
        return $this->timers;
    }
    
}

 