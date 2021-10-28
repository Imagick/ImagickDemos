<?php

function createServerBlock(
    array $portStrings,
    array $domains,
    string $root,
    string $indexFilename,
    string $phpBackend,
    string $description
) {

  $portsInfo = '';
  foreach ($portStrings as $portString) {
      $portsInfo .= "        listen $portString;\n";
  }

  $domainInfo = implode(" ", $domains);

  $output = <<< CONFIG
  
    # $description
  
    server {
        server_name $domainInfo;
$portsInfo
        root $root;
        
        location = /issues {
            return 301 https://github.com/Imagick/imagick/issues;
        }

        location ~* ^(.+).(ttf)$ {
            access_log on;
            try_files \$uri /$indexFilename?file=$1.$2&q=\$uri&\$args;
            add_header Pragma public;
            add_header Cache-Control "public";
            add_header Cache-Control "no-transform";
            add_header Cache-Control "max-age=86400";
            add_header Cache-Control "s-maxage=7200";
            #add_header XDJA "ttfblock";
        }

        location ~* ^(.+).(bmp|bz2|css|gif|doc|flac|gz|html|ico|jpg|jpeg|js|map|mid|midi|pcap|png|psd|rtf|rar|pdf|ppt|tar|tgz|ttf|txt|wav|woff|xls|zip)$ {
            #access_log off;
        try_files \$uri /$indexFilename?file=$1.$2&q=\$uri&\$args;
            expires 20m;
            add_header Pragma public;
            add_header Cache-Control "public";
            add_header Cache-Control "no-transform";
            add_header Cache-Control "max-age=1200";
            add_header Cache-Control "s-maxage=300";
            #add_header XDJA "otherblock";
        }



        location / {
            try_files \$uri /$indexFilename?q=\$uri&\$args;
            fastcgi_param HTTP_PROXY "";
            # fastcgi_index index.php;
            include /etc/nginx/fastcgi_params;
            fastcgi_param SCRIPT_FILENAME \$document_root/\$fastcgi_script_name;
            fastcgi_read_timeout 300;
            fastcgi_pass $phpBackend;
            #add_header DJA "php_front_controller";
        }

        location /index.php {
            # Mitigate https://httpoxy.org/ vulnerabilities
            fastcgi_param HTTP_PROXY "";
            # fastcgi_index index.php;
            include /etc/nginx/fastcgi_params;
            fastcgi_param SCRIPT_FILENAME \$document_root/\$fastcgi_script_name;
            fastcgi_read_timeout 300;
            fastcgi_pass $phpBackend;
            # add_header DJA "php_file";
        }
    }
CONFIG;

  return $output;
}


$im7NormalBlock = createServerBlock(
    $portStrings = ['80', '8000'],
    $domains = [
        '*.im7.phpimagick.com',
        'im7.phpimagick.com',
    ],
    $root = '/var/app/public',
    $indexFilename = 'index.php',
    $phpBackend = 'imagick_php_backend_im7:9000',
    'im7 normal block'
);

$im7DebugBlock = createServerBlock(
    $portStrings   = ['8001'],
    $domains = [
        '*.im7.phpimagick.com',
        'im7.phpimagick.com',
    ],
    $root = '/var/app/public',
    $indexFilename = 'index.php',
    $phpBackend = 'imagick_php_backend_im7:9000',
    'im7 debug block'
);

$im6NormalBlock = createServerBlock(
    $portStrings   = ['80', '8000'],
    $domains = [
        '*.im6.phpimagick.com',
        'im6.phpimagick.com',
    ],
    $root = '/var/app/public',
    $indexFilename = 'index.php',
    $phpBackend = 'imagick_php_backend_im6:9000',
    'im6 normal block'
);

$im6DebugBlock = createServerBlock(
    $portStrings   = ['8001'],
    $domains = [
        '*.im6.phpimagick.com',
        'im6.phpimagick.com',
    ],
    $root = '/var/app/public',
    $indexFilename = 'index.php',
    $phpBackend = 'imagick_php_backend_im6:9000',
    'im6 debug block'
);


if (${'system.build_debug_php_containers'} === false ||
    ${'system.build_debug_php_containers'} === 'false') {
    $im7DebugBlock = '';
    $im6DebugBlock = '';
}

$output = <<< OUTPUT

user www-data;
worker_processes auto;
pid /run/nginx.pid;
#include /etc/nginx/modules-enabled/*.conf;
daemon off;

events {
    worker_connections 768;
    # multi_accept on;
}

http {
    sendfile on;
    tcp_nopush on;
    tcp_nodelay on;
    keepalive_timeout 65;
    types_hash_max_size 2048;
    client_max_body_size 10m;
    server_tokens off;

    include /var/app/containers/nginx/config/mime.types;
    default_type application/octet-stream;


log_format main '\$http_x_real_ip - \$remote_user [\$time_local] '
    '"\$request" \$status \$body_bytes_sent '
    '"\$http_referer" "\$http_user_agent"';


    access_log /dev/stdout main;
    # access_log off;
    error_log /dev/stderr;

    gzip on;
    gzip_vary on;
    gzip_proxied any;
    #Set what content types may be gzipped.
    gzip_types text/plain text/css application/json application/javascript application/x-javascript text/javascript text/xml application/xml application/rss+xml application/atom+xml application/rdf+xml;


$im6NormalBlock

$im6DebugBlock

$im7NormalBlock

$im7DebugBlock




}

OUTPUT;



return $output;


