<?php

namespace ImagickDemo\Queue;

use Auryn\Injector as Injector;

class TaskQueueFactory
{
    private $injector;

    public function __construct(Injector $injector)
    {
        $this->injector = $injector;
    }

    /**
     * @return TaskQueue
     */
    public function createTaskQueue()
    {
        return $this->injector->make(TaskQueue::class);
    }
}
