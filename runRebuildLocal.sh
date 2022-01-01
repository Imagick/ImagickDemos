#!/usr/bin/env bash

docker-compose build --no-cache imagick_php_base_im7
docker-compose build --no-cache imagick_php_base_im6
docker-compose up --build --remove-orphans installer

# --force-recreate
docker-compose up --build imagick_php_backend_im6 imagick_php_backend_im6_debug imagick_php_backend_im7 imagick_php_backend_im7_debug js_builder redis nginx chrome_headless

# workers

