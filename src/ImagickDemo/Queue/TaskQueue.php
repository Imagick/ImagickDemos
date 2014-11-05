<?php


namespace ImagickDemo\Queue;






interface TaskQueue {

    /**
     * @return Task
     */
    function getTask();

    /**
     * @param Task $task
     */
    function pushTask(Task $task);
    
    function getName();

    function getQueueCount();
}
