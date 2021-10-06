
FROM node:14.4.0-stretch-slim

WORKDIR /var/app/app

RUN apt-get update -qq && DEBIAN_FRONTEND=noninteractive apt-get install -y git

# CMD sh /var/app/containers/css_builder/build_prod_assets.sh
CMD sh /var/app/containers/css_builder/entrypoint.sh

