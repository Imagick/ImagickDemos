<?php

namespace ImagickDemo;

use Stats\AsyncStats;

class AppTimer
{
    private $asyncStats;
    
    private $startTime = null;
    
    public function __construct(AsyncStats $asyncStats)
    {
        $this->asyncStats = $asyncStats;
    }

    public function timerStart()
    {
        $this->startTime = microtime(true);
    }

    public function timerEnd()
    {
        if ($this->startTime == null) {
            throw new \Exception("Calling timerEnd without starting it first.");
        }

        $time = microtime(true) - $this->startTime;

        $this->asyncStats->recordTime(
            \ImagickDemo\Queue\ImagickTaskRunner::EVENT_PAGE_GENERATED,
            $time
        );
    }
}
