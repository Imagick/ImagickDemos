<?php


namespace ImagickDemo\Queue;



class ImagickTaskRunner {

    /**
     * @var \Auryn\Provider
     */
    private $injector;

    //<namespace>.<instrumented section>.<target (noun)>.<action (past tense verb)>.<measure (noun)>

    //const event_imageGenerated = "phpimagick.imagickTask.image.generated.timeTaken";
    //const event_imageGenerated = "phpimagick.imagickTask.image.exception";

    // Both should have '.time' appended.
    const event_imageGenerated = "phpimagick.imagickTask.image.generated";
    const event_pageGenerated =  "phpimagick.imagickTask.page.generated";

    /**
     * @var TaskQueue
     */
    private $taskQueue;

    private $asyncStats;

    /**
     * @param TaskQueue $taskQueue
     * @param \Auryn\Provider $injector
     * @param \Stats\AsyncStats $asyncStats
     */
    function __construct(TaskQueue $taskQueue, \Auryn\Provider $injector, \Stats\AsyncStats $asyncStats) {
        $this->taskQueue = $taskQueue;
        $this->injector = $injector;
        $this->asyncStats  = $asyncStats;
    }

    /**
     * 
     */
    function run() {
        echo "ImagickTaskRunner started\n";
        //attempt to run the task
        //For any error push the task back
        //sleep if necessary

        /** @noinspection PhpUndefinedMethodInspection */
        \ImagickDemo\Imagick\functions::load();
        \ImagickDemo\ImagickDraw\functions::load();
        \ImagickDemo\ImagickPixel\functions::load();
        \ImagickDemo\ImagickPixelIterator\functions::load();
        \ImagickDemo\Tutorial\functions::load();

        $maxRunTime = 60; // one minute
        $maxRunTime *= 60; // 1hour

        //Each image generated hurries up the restart by 10 seconds
        $taskPseudoTime = 10; 

        $endTime = time() + $maxRunTime;
        
        $count = 0;

        while (time() < $endTime) {
            $this->taskQueue->setActive();
            $task = $this->taskQueue->getTask();

            if (!$task) {
                echo ".";
                $count = $count + 1;
                if ($count == 0) {
                    echo "\n";
                }
                //Sleep for 1/10th of a second 
                usleep(100000);
                continue;
            }
    
            echo "A task! "."\n";
            $endTime -= $taskPseudoTime;

            try {
                $startTime = microtime(true);
                $this->execute($task);
                $time = microtime(true) - $startTime;
                $this->asyncStats->recordTime(self::event_imageGenerated, $time);
                echo "Task complete\n";
            }
            catch(\Auryn\BadArgumentException $bae) {
                //Log failed job
                echo "There was a problem running the task: ".$bae->getMessage();
            }
        }
        echo "\nImagickTaskRunner exiting\n";
    }

    /**
     * @param ImagickTask $task
     * @throws \Exception
     */
    private function execute(ImagickTask $task) {
        $imageFunction = $task->getImageFunction();
        $params = $task->getParams();
        $filename = $task->getFilename();
        $lowried = [];

        foreach ($params as $key => $value) {
            $lowried[':'.$key] = $value;
        }
        
//        var_dump($lowried);
//        exit(0);
        

        $response = renderImageAsFileResponse($imageFunction, $filename, $this->injector, $lowried);
    }
}