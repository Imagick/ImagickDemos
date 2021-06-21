
FROM node:14.4.0-stretch-slim

WORKDIR /var/app/app


RUN apt-get update -qq && DEBIAN_FRONTEND=noninteractive apt-get install -y git

# CMD tail -f /var/app/containers/js_dev_builder/README_npm.md

CMD npm run build:dev:watch