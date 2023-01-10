#!/usr/bin/env bash

set -e
set -x


if test -f "./this_is_prod.txt"; then
    echo "this_is_prod.txt exists, delete that if you want to run prod."
    exit -1
fi

touch this_is_local.txt


docker-compose build imagick_php_base_im6
docker-compose build imagick_php_base_im7
docker-compose build imagick_php_backend_im6
docker-compose build imagick_php_backend_im7
docker-compose build imagick_php_backend_im6_debug
docker-compose build imagick_php_backend_im7_debug

docker-compose up --build --remove-orphans installer

docker-compose up --build imagick_php_backend_im6 imagick_php_backend_im6_debug imagick_php_backend_im7 imagick_php_backend_im7_debug js_builder redis nginx css_builder


# docker-compose up --build installer



# 'echo never > /sys/kernel/mm/transparent_hugepage/enabled' as root, and add it to your /etc/rc.local in order to retain the setting after a