FROM debian:9-slim

USER root

RUN apt-get update -qq \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y git \
    mariadb-client wget curl unzip \
    ca-certificates lsb-release apt-transport-https gnupg

# Install 3rd party PHP packages
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee -a /etc/apt/sources.list.d/php.list \
    && curl https://packages.sury.org/php/apt.gpg | apt-key add - \
    && apt-get update -qq \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y php7.4 php7.4-common php7.4-cli php7.4-fpm \
    php7.4-mysql  php7.4-curl php7.4-xml php7.4-mbstring php7.4-imagick \
    php7.4-intl php7.4-redis php7.4-zip

WORKDIR /var/app

# Set up configuration volumes
RUN mkdir -p /etc/config

# CMD ["/usr/sbin/php-fpm7.2", "--nodaemonize", "--fpm-config=/etc/config/fpm.conf", "-c", "/etc/config/php.ini"]

CMD sh /var/app/docker/php_backend/entrypoint.sh
