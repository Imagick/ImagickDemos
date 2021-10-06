
FROM node:14.4.0-stretch-slim

WORKDIR /var/app

RUN apt-get update -qq && DEBIAN_FRONTEND=noninteractive apt-get install -y git

CMD sh /var/app/containers/js_builder/entrypoint.sh

# CMD tail -f /var/app/docker/js_dev_builder/README_npm.md