<?php

$config = <<< END


;;;;;;;;;;;;;;;;;;;;
; Pool Definitions ; 
;;;;;;;;;;;;;;;;;;;;

; Start a new pool named 'www'.
[imagick]

; Unix user/group of processes
user = imagickdemos
group = ${'phpfpm.group'}

listen = ${'phpfpm.socket.directory'}/php-fpm-\$pool.sock

; List of ipv4 addresses of FastCGI clients which are allowed to connect.
listen.allowed_clients = 127.0.0.1

listen.owner = imagickdemos
listen.group = ${'phpfpm.group'}
listen.mode = 0664

; Per pool prefix
;prefix = /path/to/pools/\$pool
;prefix = \$pool

request_slowlog_timeout = 10
slowlog = ${'php.log.directory'}/slow.\$pool.log

request_terminate_timeout=500

pm = dynamic

pm.max_children = 20
pm.start_servers = 4
pm.min_spare_servers = 2
pm.max_spare_servers = 10
pm.max_requests = 5000

; The URI to view the FPM status page.
pm.status_path = /www-status

; Additional php.ini defines
php_admin_value[memory_limit] = ${'phpfpm.www.maxmemory'}
php_admin_value[error_log] = ${'php.errorlog.directory'}/\$pool-error.log

security.limit_extensions = .php

include = ${'imagick.root.directory'}/autogen/imagick-demos.php.fpm.ini

env[IMAGICK_DEMOS_LIBRATO_KEY] = \$IMAGICK_DEMOS_LIBRATO_KEY
env[IMAGICK_DEMOS_LIBRATO_USERNAME] = \$IMAGICK_DEMOS_LIBRATO_USERNAME
env[IMAGICK_DEMOS_LIBRATO_STATS_SOURCE_NAME] = \$IMAGICK_DEMOS_LIBRATO_STATS_SOURCE_NAME
env[IMAGICK_DEMOS_CACHE_IMAGES] = \$IMAGICK_DEMOS_CACHE_IMAGES
env[IMAGICK_DEMOS_QUEUE_IMAGES] = \$IMAGICK_DEMOS_QUEUE_IMAGES

END;

return $config;

