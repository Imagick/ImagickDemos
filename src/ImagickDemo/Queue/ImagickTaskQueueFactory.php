<?php


namespace ImagickDemo\Queue;


use Auryn\Provider as Injector;


class ImagickTaskQueueFactory {

    private $injector;
    
    function __construct(Injector $injector) {
        $this->injector = $injector;
    }
    
    /**
     * @return TaskQueue
     */
    function createTaskQueue() {
        return $this->injector->make(TaskQueue::class);
    }
}

