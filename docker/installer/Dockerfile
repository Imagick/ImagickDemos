FROM debian:9-slim

USER root

# Get Debian up-to-date
RUN apt-get update -qq \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y git \
    mariadb-client wget curl unzip \
    ca-certificates lsb-release apt-transport-https gnupg


# Install 3rd party PHP 7.4 packages
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee -a /etc/apt/sources.list.d/php.list

RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg

RUN  apt-get update -qq \
    && DEBIAN_FRONTEND=noninteractive apt-get install --no-install-recommends -y php7.4 php7.4-common php7.4-cli \
    php7.4-mysql php7.4-curl php7.4-xml php7.4-mbstring \
    php7.4-intl php7.4-redis php7.4-zip unzip

# Make the default directory you
WORKDIR /var/app

#CMD tail -f README.md

CMD sh /var/app/docker/installer/entrypoint.sh