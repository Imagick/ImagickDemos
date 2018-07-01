#!/usr/bin/env bash

set -e
set -x

/usr/sbin/php-fpm7.2 \
  --nodaemonize \
  --fpm-config=/var/www/docker/php_backend/config/fpm.conf \
  -c /var/www/docker/php_backend/config/php.ini

exit $?