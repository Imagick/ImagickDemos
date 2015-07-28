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

    private $queueName;

    private $taskKeyStateTime = 240;

    /**
     * @param RedisClient $redisClient
     * @param $queueName
     */
    public function __construct(RedisClient $redisClient, $queueName)
    {
        $this->redisClient = $redisClient;
        $this->queueName = $queueName;
        $this->taskListKey = $queueName . ':taskList';
        $this->announceListKey = $queueName . '_announceList';
        $this->statusKey = $queueName . '_status';
    }

    public function clearStatusQueue()
    {
        for ($x = 0; $x < 10; $x++) {
            $iterator = new Iterator\Keyspace($this->redisClient, $this->statusKey . "*", 200);

            $keysToDelete = [];
            foreach ($iterator as $key) {
                $keysToDelete[] = $key;
            }
            if (count($keysToDelete)) {
                $this->redisClient->del($keysToDelete);
            }
        }
    }

    public function getStatusQueue()
    {
        //$iterator = new Iterator\Keyspace($this->redisClient, $this->taskListKey . "*", 2000);
        $iterator = new Iterator\Keyspace($this->redisClient, "*", 2000);
        //$iterator = new Iterator\Keyspace($this->redisClient, $this->statusKey . "*", 2000);

        $keys = [];
        foreach ($iterator as $key) {
            $keys[] = $key;
        }

        if (!count($keys)) {
            return [];
        }

        $values = $this->redisClient->mget($keys);

        return array_combine($keys, $values);
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
        $taskKey = $task->getKey();
        $this->setStatus($taskKey, TaskQueue::STATE_BURIED);
    }

    /**
     * Mark that a task has been completed.
     * @param Task $task
     * @return mixed
     */
    public function completeTask(Task $task)
    {
        $taskKey = $task->getKey();
        $this->setStatus($taskKey, TaskQueue::STATE_COMPLETE);
    }

    /**
     * Mark that a task has errored.
     * @param Task $task
     * @return mixed
     */
    public function errorTask(Task $task)
    {
        $taskKey = $task->getKey();
        $this->setStatus($taskKey, TaskQueue::STATE_ERROR);
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
        $redisData = $this->redisClient->blpop($this->announceListKey, 5);

        //Pop timed out rather than got a task
        if ($redisData === null) {
            return null;
        }

        list(, $taskKey) = $redisData;

        $serializedTask = $this->redisClient->get($taskKey);

        if (!$serializedTask) {
            $this->setStatus($taskKey, TaskQueue::STATE_ERROR);
            throw new \Exception("Failed to find expected task " . $taskKey);
        }

        $task = @unserialize($serializedTask);
        if ($task == false) {
            $this->setStatus($taskKey, TaskQueue::STATE_ERROR);
            throw new QueueException("Failed to unserialize string $serializedTask");
        }

        $this->setStatus($taskKey, TaskQueue::STATE_WORKING);

        return $task;
    }

    /**
     * @param $taskKey
     * @param $state
     */
    private function setStatus($taskKey, $state)
    {
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
        $serialized = serialize($task);
        $existingStatus = $this->getStatus($task);

        if ($existingStatus) {
            //TODO - what should happen here?

            return null;
        }

        $taskKey = $task->getKey();
        $this->redisClient->set($taskKey, $serialized);
        $this->redisClient->rpush($this->announceListKey, $taskKey);
        $this->setStatus($taskKey, TaskQueue::STATE_INITIAL);
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
            30
        );
    }
}
