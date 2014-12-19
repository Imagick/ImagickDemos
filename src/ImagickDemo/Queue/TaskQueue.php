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


    /**
     * Returns true if the queue processor has run in the last 
     * 30 seconds.
     * @return mixed
     */
    function isActive();
    
    function setActive();
}
