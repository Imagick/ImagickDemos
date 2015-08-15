<?php

namespace ImagickDemo\Controller;

use Arya\TextBody;
use ImagickDemo\Queue\ImagickTaskQueue;
use Tier\InjectionParams;

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
        $injectionParams = InjectionParams::fromParams([]);

        return getRenderTemplateTier($injectionParams, 'admin/queueInfo');
    }
}
