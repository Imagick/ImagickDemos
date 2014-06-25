<?php


namespace ImagickDemo\Queue;



class ImagickTaskRunner {

    /**
     * @var \Auryn\Provider
     */
    private $injector;

    //<namespace>.<instrumented section>.<target (noun)>.<action (past tense verb)>.<measure (noun)>

    //const event_imageGenerated = "phpimagick.imagickTask.image.generated.timeTaken";


    const event_imageGenerated = "phpimagick.imagickTask.image.generated";
    //const event_imageGenerated = "phpimagick.imagickTask.image.exception";

    const event_pageGenerated =  "phpimagick.imagickTask.page.generated";
    
    
    /**
     * @var TaskQueue
     */
    private $taskQueue;

    private $asyncStats;
    
    function __construct(TaskQueue $taskQueue, \Auryn\Provider $injector, \Stats\AsyncStats $asyncStats) {
        $this->taskQueue = $taskQueue;
        $this->injector = $injector;
        $this->asyncStats  = $asyncStats;
    }

    function run() {
        echo "ImagickTaskRunner started\n";
        //attempt to run the task
        //For any error push the task back
        //sleep if necessary

        $maxRunTime = 60;

        $endTime = time() + $maxRunTime;

        while (time() < $endTime) {
            $task = $this->taskQueue->getTask();

            if (!$task) {
                echo ".";
                //Sleep for 1/10th of a second 
                usleep(100000);
                continue;
            }
    
            echo "A task! "."\n";

            try {
                $startTime = microtime(true);
                $task->execute($this->injector);
                $time = microtime(true) - $startTime;
                $this->asyncStats->recordTime(self::event_imageGenerated, $time);
            }
            catch(\Auryn\BadArgumentException $bae) {
                //Log failed job
            }
        }
    }
}