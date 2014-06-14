<?php


namespace ImagickDemo\Queue;



class ImagickTaskRunner {

    /**
     * @var \Auryn\Provider
     */
    private $injector;

    /**
     * @var TaskQueue
     */
    private $taskQueue;

    function __construct(TaskQueue $taskQueue, \Auryn\Provider $injector) {
        $this->taskQueue = $taskQueue;
        $this->injector = $injector;
    }

    function run() {
        //attempt to run the task
        //For any error push the task back
        //sleep if necessary

        $maxRunTime = 3000;

        $endTime = time() + $maxRunTime;

        while (time() < $endTime) {
            $task = $this->taskQueue->getTask();

            if (!$task) {
                echo "No task.\n";
                continue;
            }
    
            echo "A task! ".$task->getFunctionName()."\n";
            $task->execute($this->injector);
            usleep(10);
        }
    }
}