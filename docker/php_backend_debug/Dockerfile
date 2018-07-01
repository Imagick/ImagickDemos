FROM imagick_php_backend:latest

# TODO xdebug isn't currently stable with php 7.2
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends php7.2-xdebug

COPY xdebug.ini /etc/php/7.2/fpm/conf.d/20-xdebug.ini
