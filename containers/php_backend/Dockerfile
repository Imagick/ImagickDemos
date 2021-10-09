
FROM imagick_php_base:latest

USER root

WORKDIR /var/app
RUN cd /var/app

# Set up configuration volumes
RUN mkdir -p /etc/config

CMD sh /var/app/containers/php_backend/entrypoint.sh
# CMD tail -f /var/app/containers/php_backend/README_php.md