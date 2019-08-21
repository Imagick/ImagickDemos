FROM imagick_php_backend:latest

RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
  supervisor

RUN mkdir -p /var/log/supervisor

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# COPY dead/statsUploader.conf /etc/supervisor/conf.d/statsUploader.conf
COPY imageGenerator.conf /etc/supervisor/conf.d/imageGenerator.conf

# CMD tail -f README.md
CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
