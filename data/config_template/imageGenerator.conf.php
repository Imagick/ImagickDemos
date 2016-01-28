<?php

$config = <<< END


[program:imageTaskRunner]
directory=${'imagick_root_directory'}
command=php bin/cli.php imageRunner
process_name=%(program_name)s_%(process_num)d
numprocs=4
autostart=true
autorestart=true
user=${'app_name'}
stdout_logfile=${'php_log_directory'}/imageGenerator_stdout.log
stdout_logfile_maxbytes=1MB
stderr_logfile=${'php_log_directory'}/imageGenerator_stderr.log
stderr_logfile_maxbytes=1MB
log_stdout=true             ; if true, log program stdout (default true)
log_stderr=true             ; if true, log program stderr (def false)



END;

return $config;
