<?php



namespace ImagickDemo\Queue;

use Predis\Client as RedisClient;

class RedisTaskQueue implements TaskQueue {

    private $redisClient;

    /**
     * @param RedisClient $redisClient
     */
    function __construct(RedisClient $redisClient) {
        $this->redisClient = $redisClient;
        $this->redisKey = "ImagickTaskQueue";
    }

    /**
     * @return int
     */
    function getQueueCount() {
        $count = $this->redisClient->LLEN($this->redisKey);

        return $count;
    }

    /**
     * @return string
     */
    function getName() {
        return "Queue."."ImagickTaskQueue";
    }

    /**
     * @return mixed|null
     */
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

    /**
     * @param Task $task
     */
    function pushTask(Task $task) {
        $serialized = serialize($task);
        $this->redisClient->rpush($this->redisKey, [$serialized]);
    }

    /**
     * @return string
     */
    private function getActiveKey() {
        return "Queue."."ImagickTaskQueue"."Active";
    }


    /**
     * @return string
     */
    function isActive() {
        return $this->redisClient->get($this->getActiveKey());
    }

    /**
     * 
     */
    function setActive() {
        $this->redisClient->set(
            $this->getActiveKey(),
            true,
            'EX',
            30
        );
    }
}
