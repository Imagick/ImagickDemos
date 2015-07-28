<?php

namespace ImagickDemo\Queue;

interface Task
{
    /**
     * Return a unique string for the task.
     * @return string
     */
    public function getKey();
    
    /**
     * Serialize the task to a string.
     * @return mixed
     */
    public function serialize();

    /**
     * Unserialize a string to be an instantiated instance
     * of the task
     * @param $data
     * @return mixed
     */
    public static function unserialize($data);
}
