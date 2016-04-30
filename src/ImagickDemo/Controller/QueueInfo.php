<?php

namespace ImagickDemo\Controller;

use Room11\HTTP\Body\TextBody;
use ImagickDemo\Queue\ImagickTaskQueue;
use Tier\InjectionParams;
use Tier\Tier;
use Tier\Bridge\JigExecutable;

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
