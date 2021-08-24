<?php

namespace ImagickDemo\Controller;

use Room11\HTTP\Body\TextBody;
use ImagickDemo\Queue\ImagickTaskQueue;

class QueueInfo
{
    public function deleteQueue(ImagickTaskQueue $taskQueue)
    {
        $taskQueue->clearAllQueue();
        $taskQueue->clearErrors();

        return new TextBody("Some stuff should be cleared.");
    }

    public function createResponse()
    {
        return JigExecutable::create('admin/queueInfo');
    }
}
