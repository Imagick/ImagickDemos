#!/usr/bin/env bash

# docker-compose build --no-cache imagick_php_base
docker-compose build imagick_php_base
docker-compose up --build installer
docker-compose up --build imagick_php_backend imagick_php_backend_debug js_builder redis web_server chrome_headless

# workers

