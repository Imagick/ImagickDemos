#!/usr/bin/env bash


docker-compose build
# docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d


docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d --build --force-recreate installer imagick_php_backend redis web_server workers
