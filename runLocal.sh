#!/usr/bin/env bash



docker-compose up --build installer
docker-compose up --build imagick_php_backend imagick_php_backend_debug npm redis web_server workers

