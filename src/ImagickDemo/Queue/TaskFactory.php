<?php


namespace ImagickDemo\Queue;


interface TaskFactory {

    /**
     * @return mixed
     */
    function createTask();
}

