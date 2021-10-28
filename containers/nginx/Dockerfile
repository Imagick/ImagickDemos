FROM debian:9

USER root

RUN apt-get update -qq \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y nginx \
    ca-certificates

WORKDIR /var/app

# Set up configuration volumes
RUN mkdir -p /etc/config

WORKDIR /var/app

CMD sh /var/app/containers/nginx/entrypoint.sh
