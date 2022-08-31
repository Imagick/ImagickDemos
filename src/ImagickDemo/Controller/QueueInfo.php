<?php

namespace ImagickDemo\Controller;

use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryNav;
use ImagickDemo\NavigationBar;
use Room11\HTTP\Body\TextBody;
use ImagickDemo\Queue\ImagickTaskQueue;
use ImagickDemo\Model\QueueInfo as QueueInfoService;

class QueueInfo
{
    public function deleteQueue(ImagickTaskQueue $taskQueue)
    {
        $taskQueue->clearAllQueue();
        $taskQueue->clearErrors();

        return new TextBody("Some stuff should be cleared.");
    }

    public function createResponse(
        PageInfo $pageInfo,
        CategoryNav $categoryNav,
        NavigationBar $navigationBar,
        QueueInfoService $queueInfoService
    ) {
          $info = $queueInfoService->render();

          $html = <<< HTML

<div class='contentPanel support_panel'>
    
<p>
$info
</p>
</div>
HTML;

          return renderTextPageSass(
              $pageInfo,
              $categoryNav,
              $navigationBar,
              $html
          );
    }
}


