<?php

namespace ImagickDemo\Controller;


use ImagickDemo\Queue\ImagickTaskQueue;

use Arya\TextBody;

class QueueInfo
{
    public function deleteQueue(ImagickTaskQueue $taskQueue)
    {
        //$taskQueue->clearStatusQueue();
        $taskQueue->clearAllQueue();

        return new TextBody("Some stuff should be cleared.");
    }

    public function createResponse(ImagickTaskQueue $taskQueue)
    {
        ob_start();

        $functions = [
            'Status' => 'getStatusQueue',
            'Task' => 'getTaskQueue',
            'Announce' => 'getAnnounceQueue',
            'All' => 'getAllQueue',
        ];

        foreach ($functions as $title => $method) {
            echo "<h2>$title</h2>";

            $entries = $taskQueue->{$method}();
            if (count($entries) == 0) {
                echo "No entries found.";
                continue;
            }

            echo "<table>";

            foreach ($entries as $key => $value) {
                $value = substr($value, 0, 30);
                printf(
                    "<tr>
                    <td>$key</td>
                    <td>$value</td>
                </tr>",
                    $key,
                    $value
                );
            }

            echo "</table>";

        }
        
        $output = ob_get_contents();

        ob_end_clean();

        return new TextBody($output);
    }
}
