FROM imagick_php_backend_im7:latest

RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends php8.0-xdebug

COPY xdebug.ini /etc/php/8.0/fpm/conf.d/20-xdebug.ini
