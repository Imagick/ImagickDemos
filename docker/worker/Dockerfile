FROM imagick_php_backend:latest

# TODO xdebug isn't currently stable with php 7.2
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
  supervisor


RUN mkdir -p /var/log/supervisor

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY statsUploader.conf /etc/supervisor/conf.d/statsUploader.conf
COPY imageGenerator.conf /etc/supervisor/conf.d/imageGenerator.conf

# CMD tail -f README.md

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]


# /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf

# Set up configuration volumes
# RUN mkdir -p /etc/config


# CMD ["/usr/sbin/php-fpm7.2", "--nodaemonize", "--fpm-config=/etc/config/fpm.conf", "-c", "/etc/config/php.ini"]

# CMD sh /var/www/docker/php_backend/run.sh


