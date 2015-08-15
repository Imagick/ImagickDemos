<?php


namespace ImagickDemo\Model;

use ImagickDemo\Queue\ImagickTaskQueue;

class QueueInfo
{
    /**
     * @var ImagickTaskQueue
     */
    private $taskQueue;
    
    public function __construct(ImagickTaskQueue $taskQueue)
    {
        $this->taskQueue = $taskQueue;
    }
    
    public function render()
    {
        ob_start();

        $functions = [
            'Status' => 'getStatusQueue',
            'Task' => 'getTaskQueue',
            'Announce' => 'getAnnounceQueue',
            //'All' => 'getAllQueue',
        ];

        foreach ($functions as $title => $method) {
            echo "<h2>$title</h2>";

            $entries = $this->taskQueue->{$method}();
            if (count($entries) == 0) {
                echo "No entries found.";
                continue;
            }

            echo "<table>";

            foreach ($entries as $key => $value) {
                $value = substr($value, 0, 30);
                printf(
                    "<tr>
                    <td>%s</td>
                    <td>%s</td>
                </tr>",
                    $key,
                    $value
                );
            }

            echo "</table>";
        }
        
        
        $errors = $this->taskQueue->getErrors();
        
        echo "<table>";
        foreach ($errors as $error) {
            printf(
                "<tr>
                    <td>%s</td>
                    <td><a href='%s'>%s</a></td>
                </tr>",
                $error['message'],
                $error['uri'],
                $error['uri']
            );

        }

        echo "</table>";
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}
