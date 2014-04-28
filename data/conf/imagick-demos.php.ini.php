<?php

$config = <<< END

extension=imagick.so
default_charset = "utf-8";

post_max_size = 10M
upload_max_filesize = 10M

date.timezone = 'UTC'
allow_url_fopen = Off
allow_url_include = Off
auto_detect_line_endings = On

output_buffering = Off

cgi.fix_pathinfo = 0
apc.shm_size="64M"

END;



return $config;