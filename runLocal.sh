#!/usr/bin/env bash

set -e
set -x

docker-compose build imagick_php_base_im6
docker-compose build imagick_php_base_im7

docker-compose up --build --remove-orphans installer

docker-compose up --build imagick_php_backend_im6 imagick_php_backend_im6_debug imagick_php_backend_im7 imagick_php_backend_im7_debug js_builder redis nginx chrome_headless

# workers

# docker-compose up --build installer