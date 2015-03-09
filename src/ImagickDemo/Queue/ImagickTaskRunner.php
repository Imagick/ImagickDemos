<?php


namespace ImagickDemo\Queue;

use ImagickDemo\Framework\ArrayVariableMap;

class ImagickTaskRunner {

    /**
     * @var \Auryn\Provider
     */
    private $injector;

    // <namespace>.<instrumented section>.<target (noun)>.<action (past tense verb)>.<measure (noun)>
    // 
    // const event_imageGenerated = "phpimagick.imagickTask.image.generated.timeTaken";
    // const event_imageGenerated = "phpimagick.imagickTask.image.exception";

    // Both should have '.time' appended.
    const event_imageGenerated = "phpimagick.imagickTask.image.generated";
    const event_pageGenerated =  "phpimagick.imagickTask.page.generated";

    /**
     * @var TaskQueue
     */
    private $taskQueue;

    private $asyncStats;

    /**
     * @param ImagickTaskQueue $taskQueue
     * @param \Auryn\Provider $injector
     * @param \Stats\AsyncStats $asyncStats
     */
    function __construct(
        ImagickTaskQueue $taskQueue,
        \Auryn\Provider $injector,
        \Stats\AsyncStats $asyncStats
    ) {
        $this->taskQueue = $taskQueue;
        $this->injector = $injector;
        $this->asyncStats  = $asyncStats;
    }

    /**
     * 
     */
    function run() {
        echo "ImagickTaskRunner started\n";
        /** @noinspection PhpUndefinedMethodInspection */
        \ImagickDemo\Imagick\functions::load();
        \ImagickDemo\ImagickDraw\functions::load();
        \ImagickDemo\ImagickPixel\functions::load();
        \ImagickDemo\ImagickKernel\functions::load();
        \ImagickDemo\ImagickPixelIterator\functions::load();
        \ImagickDemo\Tutorial\functions::load();

        $maxRunTime = 60; // one minute
        $maxRunTime *= 60; // 1hour

        // Each image generated hurries up the restart by 50 seconds
        // for a max of 72 images generated per run
        $taskPseudoTime = 50; 
        $endTime = time() + $maxRunTime;
        $count = 0;

        while (time() < $endTime) {
            $task = $this->taskQueue->waitToAssignTask();
            if (!$task) {
                echo ".";
                $count = $count + 1;
                if (($count % 20) == 0) {
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
                $this->taskQueue->completeTask($task);
            }
            catch(ImagickException $ie) {
                echo "ImagickException running the task: ".$ie->getMessage();
                $this->taskQueue->errorTask($task);
            }
            catch(\Auryn\BadArgumentException $bae) {
                //Log failed job
                echo "BadArgumentException running the task: ".$bae->getMessage();
                $this->taskQueue->errorTask($task);
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
        $imageTypes = ['jpg', 'gif', 'png'];
        
        foreach ($imageTypes as $imageType) {
            $fullFilename = $filename.".".$imageType;
            if (file_exists($fullFilename) == true) {
                return;
            }
        }

        $lowried = [];
        foreach ($params as $key => $value) {
            $lowried[':'.$key] = $value;
        }

        $injector = clone $this->injector;
        $variableMap = new ArrayVariableMap($params);
        $injector->alias('ImagickDemo\Framework\VariableMap', get_class($variableMap));
        $injector->share($variableMap);

        echo "filename was $filename\n";
        renderImageAsFileResponse($imageFunction, $filename, $injector, $lowried);
    }
}