<?php




class RedisLogWriter extends CliTool {

    use \Intahwebz\Cache\KeyName;
    
    private $redisClient;
    
    private $logPath;

    /**
     * @param RedisClient $redisClient
     * @param LogPath $logPath
     */
    function __construct(RedisClient $redisClient, LogPath $logPath) {
        $this->redisClient = $redisClient;
        $this->logPath = $logPath;
    }

    /**
     * 
     */
    function main() {
        $key = self::getClassKey();

        $fileHandle = fopen($this->logPath->getSafePath('.', "Redis.log"), "a");

        $loops = 0;
        
        $writesPerSecond = 500;
        $maxRunTime = 30; 
        
        $sleepTime = intval(1000000 / $writesPerSecond);

        $endTime = time() + $maxRunTime;
        $count = 0;

        while (time() < $endTime) {

            //A nil multi-bulk when no element could be popped and the timeout expired.
            //A two-element multi-bulk with the first element being the name of the key where an element was popped and the second element being the value of the popped element.

            //Timeout should be less than socket timeout.
            $logEntries = $this->redisClient->blpop($key, 5);

            if ($logEntries) {
                for ($x=0 ; $x<count($logEntries) ; $x+=2) {

                    $logEntry = $logEntries[$x + 1];
                    
                    $written = fwrite($fileHandle, $logEntry);
        
                    if ($written) {
                        printf("wrote log entry %d.\n", $count);
                        $count++;
                    }
                    else {
                        //Todo - push back all remaining log entries.
                        //$this->redisClient->lpush($key, $logEntry);
                        throw new \RuntimeException("Failed to write to log file,");
                    }
                }
            }
            usleep($sleepTime);
            $loops++;
        }

        fclose($fileHandle);
        echo "Fin.\n";
    }
}
