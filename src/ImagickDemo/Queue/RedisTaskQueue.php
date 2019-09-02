<?php

namespace ImagickDemo\Queue;

use Predis\Client as RedisClient;
use Predis\Collection\Iterator;

class RedisTaskQueue implements TaskQueue
{
    /**
     * @var RedisClient
     */
    private $redisClient;

    private $taskListKey;
    private $announceListKey;
    private $statusKey;
    private $errorKey;

    private $queueName;

    private $taskKeyStateTime = 10;
    
    private $errorKeyStateTime = 604800;//(7 * 24 * 3600);

    const ACTIVE_TIMEOUT = 30;
    const TASK_TTL = 120;

    /**
     * @param RedisClient $redisClient
     * @param $queueName
     */
    public function __construct(RedisClient $redisClient, $queueName)
    {
        $this->redisClient = $redisClient;
        $this->queueName = $queueName;
        $this->taskListKey = $queueName . '_taskList:';
        $this->announceListKey = $queueName . '_announceList:';
        $this->statusKey = $queueName . '_status:';
        
        $this->errorKey = $queueName . '_errors:';
    }

    public function clearTaskQueue()
    {
        $this->clearQueue($this->taskListKey);
    }
    
    public function clearAnnounceQueue()
    {
        $this->clearQueue($this->announceListKey);
    }
    
    public function clearAllQueue()
    {
        $this->clearQueue("");
    }
    
    public function clearErrors()
    {
        $this->redisClient->ltrim($this->errorKey, 100, -1);
    }

    public function clearStatusQueue()
    {
        $this->clearQueue($this->statusKey);
    }
     
    public function getErrors()
    {
        $jsonEntries = $this->redisClient->lrange(
            $this->errorKey,
            0,
            99
        );
        
        $entries = [];
        
        foreach ($jsonEntries as $entry) {
            $entries[] = json_decode($entry, true);
        }
        
        return $entries;
    }
    
    public function clearQueue($stub)
    {
        for ($x = 0; $x < 10; $x++) {
            $iterator = new Iterator\Keyspace($this->redisClient, $stub."*", 200);

            $keysToDelete = [];
            foreach ($iterator as $key) {
                $keysToDelete[] = $key;
            }
            if (count($keysToDelete)) {
                $this->redisClient->del($keysToDelete);
            }
        }
    }

    /**
     * @return array
     */
    public function getStatusQueue()
    {
        return $this->getQueueEntries($this->statusKey);
    }
    
    public function getTaskQueue()
    {
        return $this->getQueueEntries($this->taskListKey);
    }
    
    public function getAnnounceQueue()
    {
        return $this->getQueueEntries($this->announceListKey);
    }
    
    public function getAllQueue()
    {
        return $this->getQueueEntries('');
    }
    
    private function getQueueEntries($keyStub)
    {
        $iterator = new Iterator\Keyspace($this->redisClient, $keyStub."*", 2000);
        $keyList = [];
        foreach ($iterator as $key) {
            $keyList[] = $key;
        }

        if (!count($keyList)) {
            return [];
        }

        $values = $this->redisClient->mget($keyList);

        return array_combine($keyList, $values);
    }


    /**
     * @return int
     */
    public function getQueueCount()
    {
        $count = $this->redisClient->LLEN($this->announceListKey);

        return $count;
    }

    /**
     * Mark that a task is not to be processed.
     * @param Task $task
     * @return mixed
     */
    public function buryTask(Task $task)
    {
        $this->setStatus($task, TaskQueue::STATE_BURIED);
    }

    /**
     * Mark that a task has been completed.
     * @param Task $task
     * @return mixed
     */
    public function completeTask(Task $task)
    {
        $this->setStatus($task, TaskQueue::STATE_COMPLETE);
    }

    /**
     * Mark that a task has errored.
     * @param Task $task
     * @return mixed
     */
    public function errorTask(Task $task, $message)
    {
        $this->setStatus($task, TaskQueue::STATE_ERROR);
        /** @var  ImagickTask $task */
    
        $data = json_encode([
            'message' => $message,
            'uri' => $task->getUri(),
        ]);
        $this->redisClient->rpush(
            $this->errorKey,
            [$data]
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return "Queue." . "ImagickTaskQueue";
    }

    /**
     * @throws QueueException
     * @throws \Exception
     * @return Task
     */
    public function waitToAssignTask()
    {
        $this->setActive();
        // A nil multi-bulk when no element could be popped and the timeout expired.
        // A two-element multi-bulk with the first element being the name of the key
        // where an element was popped and the second element being the value of
        // the popped element.
//        set_time_limit(90);
        $redisData = $this->redisClient->blpop($this->announceListKey, 10);

        //Pop timed out rather than got a task
        if ($redisData === null) {
            return null;
        }

        list(, $taskKey) = $redisData;

        $serializedTask = $this->redisClient->get($this->taskListKey.$taskKey);

        if (!$serializedTask) {
            $data = var_export($serializedTask, true);
            throw new QueueException("Failed to find expected task ".$taskKey.". Data returned was ".$data);
        }

        $task = @unserialize($serializedTask);
        if ($task == false) {
            $this->setStatus($taskKey, TaskQueue::STATE_ERROR);
            throw new QueueException("Failed to unserialize string $serializedTask");
        }

        $this->setStatus($task, TaskQueue::STATE_WORKING);

        return $task;
    }


    private function setStatus(Task $task, $state)
    {
        $taskKey = $task->getKey();
        $statusKey = $this->statusKey . $taskKey;
        $this->redisClient->set($statusKey, $state, 'EX', $this->taskKeyStateTime);
    }

    /**
     * @param Task $task
     * @return string
     */
    public function getStatus(Task $task)
    {
        $statusKey = $this->statusKey . $task->getKey();
        return $this->redisClient->get($statusKey);
    }

    /**
     * @param Task $task
     * @return null
     */
    public function addTask(Task $task)
    {
        $taskKey = $task->getKey();
        $taskSpecificKey = $this->taskListKey.$taskKey;

        $serialized = serialize($task);
        $existingStatus = $this->getStatus($task);

        if ($existingStatus) {
            //TODO - what should happen here?
            return $taskSpecificKey;
        }

        $this->redisClient->set(
            $taskSpecificKey,
            $serialized,
            'EX',
            self::TASK_TTL
        );
        $this->redisClient->rpush($this->announceListKey, $taskKey);
        $this->setStatus($task, TaskQueue::STATE_INITIAL);
        
        return true;
    }

    /**
     * @return string
     */
    private function getActiveKey()
    {
        return "Queue." . $this->queueName . "Active";
    }

    /**
     * @return string
     */
    public function isActive()
    {
        return $this->redisClient->get($this->getActiveKey());
    }

    /**
     *
     */
    private function setActive()
    {
        $this->redisClient->set(
            $this->getActiveKey(),
            true,
            'EX',
            self::ACTIVE_TIMEOUT
        );
    }
}
