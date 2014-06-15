<?php



namespace ImagickDemo\Queue;

use Predis\Client as RedisClient;

class RedisTaskQueue implements TaskQueue {

    private $redisClient;

    function __construct(RedisClient $redisClient) {
        $this->redisClient = $redisClient;
        $this->redisKey = "ImagickTaskQueue";//$key;   
    }

    function getQueueCount() {
        $count = $this->redisClient->LLEN($this->redisKey);

        return $count;
    }

    function getName() {
        return "Queue."."ImagickTaskQueue";
    }
    
    
    function getTask() {
        //A nil multi-bulk when no element could be popped and the timeout expired.
        //A two-element multi-bulk with the first element being the name of the key where an element was popped and the second element being the value of the popped element.

        $redisData = $this->redisClient->blpop($this->redisKey, 5);

        if (!$redisData) {
            return null;
        }

        for ($x=0 ; $x<count($redisData) ; $x+=2) {
            $task = unserialize($redisData[$x + 1]);
            return $task;
        }

        return null;
    }

    function pushTask(Task $task) {
        $serialized = serialize($task);
        $this->redisClient->rpush($this->redisKey, [$serialized]);
    }
}
