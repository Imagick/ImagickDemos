<?php


namespace ImagickDemo\Queue;

use ImagickDemo\Framework\ArrayVariableMap;
use Auryn\InjectionException;
use ImagickDemo\Navigation\CategoryInfo;

class ImagickTaskRunner
{

    /**
     * @var \Auryn\Injector
     */
    private $injector;

    // <namespace>.<instrumented section>.<target (noun)>.<action (past tense verb)>.<measure (noun)>
    //
    // const event_imageGenerated = "phpimagick.imagickTask.image.generated.timeTaken";
    // const event_imageGenerated = "phpimagick.imagickTask.image.exception";

    // Both should have '.time' appended.
    const EVENT_IMAGE_GENERATED = "phpimagick.imagickTask.image.generated";
    const EVENT_PAGE_GENERATED = "phpimagick.imagickTask.page.generated";

    /**
     * @var TaskQueue
     */
    private $taskQueue;

    private $asyncStats;

    /**
     * @param ImagickTaskQueue $taskQueue
     * @param \Auryn\Injector $injector
     * @param \Stats\AsyncStats $asyncStats
     */
    public function __construct(
        ImagickTaskQueue $taskQueue,
        \Auryn\Injector $injector,
        \Stats\AsyncStats $asyncStats
    ) {
        $this->taskQueue = $taskQueue;
        $this->injector = $injector;
        $this->asyncStats = $asyncStats;
    }

    /**
     *
     */
    public function run()
    {
        echo "ImagickTaskRunner started\n";
        \Imagick::setResourceLimit(\Imagick::RESOURCETYPE_TIME, 60);
        /** @noinspection PhpUndefinedMethodInspection */
        \ImagickDemo\Imagick\functions::load();
        \ImagickDemo\ImagickDraw\functions::load();
        \ImagickDemo\ImagickPixel\functions::load();
        \ImagickDemo\ImagickKernel\functions::load();
        \ImagickDemo\ImagickPixelIterator\functions::load();
        \ImagickDemo\Tutorial\functions::load();

// ImageMagick has a 'non-optimal' way of measuring time passed
// https://github.com/ImageMagick/ImageMagick/issues/113
// Currently it does not appear possible to have both protection
//        $maxRunTime = 60; // one minute
//        $maxRunTime *= 60; // 1hour
//
//        // Each image generated hurries up the restart by 50 seconds
//        // for a max of 72 images generated per run
//        $taskPseudoTime = 50;
// End rant
        
        //Start remove this when time limit can be controlled better
        $maxRunTime = \Imagick::getResourceLimit(\Imagick::RESOURCETYPE_TIME); // one minute
        if ($maxRunTime <= 10) {
            $maxRunTime = 45;
        }

        // Each image generated hurries up the restart by 2 seconds
        // for a max of 30 images generated per run
        $taskPseudoTime = 2;
        //End remove this when time limit can be controlled better

        
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
                $this->asyncStats->recordTime(self::EVENT_IMAGE_GENERATED, $time);
                echo "Task complete\n";
                $this->taskQueue->completeTask($task);
            }
            catch (\ImagickException $ie) {
                echo "ImagickException running the task: " . $ie->getMessage();
                $this->taskQueue->errorTask($task, get_class($ie).": ".$ie->getMessage());
            }
            catch (\Auryn\BadArgumentException $bae) {
                //Log failed job
                echo "BadArgumentException running the task: " . $bae->getMessage();
                $this->taskQueue->errorTask($task, get_class($bae).": ".$bae->getMessage());
            }
            catch (\Exception $e) {
                echo "Exception running the task: " . $e->getMessage();
                $this->taskQueue->errorTask($task, get_class($e).": ".$e->getMessage());
            }
        }
        echo "\nImagickTaskRunner exiting\n";
    }

    /**
     * @param ImagickTask $task
     * @throws \Exception
     */
    private function execute(ImagickTask $task)
    {
        $pageInfo = $task->getPageInfo();
        $params = $task->getParams();
        $filename = $task->getFilename();
        $imageTypes = ['jpg', 'gif', 'png'];

        echo "file base name is $filename\n";
        
        foreach ($imageTypes as $imageType) {
            $fullFilename = $filename . "." . $imageType;
            if (file_exists($fullFilename) == true) {
                echo "File $fullFilename already exists - skipping generation\n";
                return;
            }
        }

        $injector = clone $this->injector;
        
        $lowried = [];
        foreach ($params as $key => $value) {
            $lowried[':' . $key] = $value;
        }

        $variableMap = new ArrayVariableMap($params);
        $injector->alias('ImagickDemo\Framework\VariableMap', get_class($variableMap));
        $injector->share($variableMap);

        if ($task->isCustomImage()) {
            $imageFunction = CategoryInfo::getCustomImageFunctionName($pageInfo);
        }
        else {
            $imageFunction = CategoryInfo::getImageFunctionName($pageInfo);
        }
        
        $controlClassName = CategoryInfo::getControlClassName($pageInfo);
        if ($controlClassName) {
            $injector->alias('ImagickDemo\Control', $controlClassName);
        }

        echo "Image Function name is: \n";
        var_dump($imageFunction);

        try {
            $result = renderImageAsFileResponse($imageFunction, $filename, $injector, $lowried);
            echo "file written: $filename \n";
        }
        catch (InjectionException $ie) {
            echo "InjectionException calling image function: ".var_export($imageFunction, true)."\n";
            echo "Details: ".$ie->getMessage()."\n";
        }
    }
/*

<?php

declare(ticks = 1); // how often to check for signals
function sig_handler($signo){ // this function will process sent signals
 if ($signo == SIGTERM || $signo == SIGHUP || $signo == SIGINT){
 print "\tGrandchild : "
 .getmypid()
 . " I got signal $signo and will exit!\n";
// If this were something important we might do data cleanup here
  exit();
 }
}

// These define the signal handling
pcntl_signal(SIGTERM, "sig_handler");
pcntl_signal(SIGHUP,  "sig_handler");
pcntl_signal(SIGINT, "sig_handler");

print "Grandchild : ".getmypid()."\n";
sleep(15);
print "\tGrandchild : " . getmypid() . " exiting\n";
exit();



*/
}
