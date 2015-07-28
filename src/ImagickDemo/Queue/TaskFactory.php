<?php

namespace ImagickDemo\Queue;

interface TaskFactory
{

    /**
     * @return mixed
     */
    public function createTask();
}
