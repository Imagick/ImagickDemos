FROM debian:11-slim AS builder

USER root

RUN apt-get update -qq \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y git \
    mariadb-client wget curl unzip inetutils-ping sed \
    ca-certificates lsb-release apt-transport-https gnupg

# Install 3rd party PHP packages
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee -a /etc/apt/sources.list.d/php.list \
    && curl https://packages.sury.org/php/apt.gpg | apt-key add - \
    && apt-get update -qq \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y php8.0 php8.0-common php8.0-cli php8.0-fpm \
    php8.0-mysql  php8.0-curl php8.0-xml php8.0-mbstring  \
    php8.0-intl php8.0-redis php8.0-zip php8.0-dev

FROM builder AS imagick_builder
RUN apt-get update -qq \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y gcc make \
    libpng-dev libjpeg-dev ghostscript libxml2-dev  \
    libtiff5-dev libwebp-dev libfreetype6-dev libfftw3-dev

COPY install_imagemagick.sh /tmp/install_imagemagick.sh
COPY install_imagick.sh /tmp/install_imagick.sh

RUN sh /tmp/install_imagemagick.sh
RUN sh /tmp/install_imagick.sh

FROM builder as actual_site

RUN apt-get install -y \
 libpng-dev libjpeg-dev ghostscript libxml2-dev  \
 libtiff5-dev libwebp-dev libfreetype6-dev libfftw3-dev

COPY --from=imagick_builder /usr/im6/ /usr/im6

RUN echo "extension=imagick.so" > /etc/php/8.0/fpm/conf.d/imagick.ini
RUN echo "extension=imagick.so" > /etc/php/8.0/cli/conf.d/imagick.ini

COPY --from=imagick_builder /usr/lib/php/20200930/imagick.so /usr/lib/php/20200930/imagick.so

# Check that Imagick is loaded and working. It's better for
# the container to fail to build, than for it to be built, but
# not working.
# COPY check_imagick_working.php /tmp/check_imagick_working.php
# RUN php /tmp/check_imagick_working.php

CMD echo "The PHP Imagick base image has been run."

# CMD tail -f /var/app/README.md