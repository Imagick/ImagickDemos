<?php


namespace ImagickDemo\Controller;

use ImagickDemo\Response\TextResponse;
use ImagickDemo\Queue\ImagickTaskQueue;



class QueueInfo {

    function createResponse(ImagickTaskQueue $taskQueue) {

        ob_start();

        $foo = $taskQueue->getStatusQueue();
        
        foreach ($foo as $key => $value) {
            $value = substr($value, 0, 15);
            echo "$key : $value <br/>";
        }
        

        $output = ob_get_contents();

        ob_end_clean();

        return new TextResponse($output);
    }
}

 