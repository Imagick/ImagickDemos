FROM imagick_php_backend:latest

RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends php7.4-xdebug

COPY xdebug.ini /etc/php/7.4/fpm/conf.d/20-xdebug.ini
