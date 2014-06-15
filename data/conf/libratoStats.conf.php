<?php

$config = <<< END


[program:libratoStats]
directory=${'imagick.root.directory'}/tool
command=/usr/local/bin/php libratorTest.php 
process_name=%(program_name)s
numprocs=1
autostart=true
autorestart=true
user=intahwebz
stdout_logfile=${'php.log.directory'}/libratoStats_stdout.log
stdout_logfile_maxbytes=1MB
stderr_logfile=${'php.log.directory'}/libratoStats_stderr.log
stderr_logfile_maxbytes=1MB
log_stdout=true             ; if true, log program stdout (default true)
log_stderr=true             ; if true, log program stderr (def false)



END;

return $config;

