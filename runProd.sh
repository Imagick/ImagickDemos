#!/usr/bin/env bash


# This needs to be built first, as docker doesn't resolve dependencies
# docker-compose build --no-cache imagick_php_base

docker-compose build --no-cache imagick_php_base_im6
docker-compose build --no-cache imagick_php_base_im7

# docker-compose build imagick_php_base_im6
# docker-compose build imagick_php_base_im7

# Build all other containers.
# docker-compose build

docker-compose -f docker-compose.yml -f docker-compose.prod.yml up  --build --force-recreate installer
docker-compose -f docker-compose.yml -f docker-compose.prod.yml up  --build --force-recreate js_builder

docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d --build --force-recreate --remove-orphans imagick_php_backend_im6 imagick_php_backend_im7 nginx redis

# docker-compose -f docker-compose.yml -f docker-compose.prod.yml up --build --force-recreate --remove-orphans imagick_php_backend_im6 imagick_php_backend_im7 nginx redis

# redis
# workers
