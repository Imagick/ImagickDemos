#!/usr/bin/env bash

set -e
set -x


ENV_TO_USE=${ENV_DESCRIPTION:=default}

echo "ENV_TO_USE is ${ENV_TO_USE}";

# Generate nginx config file for the centos,dev environment
php vendor/bin/configurate \
    -p server_config.php \
    containers/php_backend/config/fpm.conf.php \
    containers/php_backend/config/fpm.conf \
    $ENV_TO_USE


php vendor/bin/configurate \
    -p server_config.php \
    containers/php_backend/config/php.ini.php \
    containers/php_backend/config/php.ini \
    $ENV_TO_USE

# clear redis here not in installer
# php cli.php clearRedis

/usr/sbin/php-fpm8.0 \
  --nodaemonize \
  --fpm-config=/var/app/containers/php_backend/config/fpm.conf \
  -c /var/app/containers/php_backend/config/php.ini

exit $?