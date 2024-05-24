
FROM node:14.4.0-buster-slim


RUN apt-get update -qq && DEBIAN_FRONTEND=noninteractive apt-get install -y git



WORKDIR /var/app

CMD sh /var/app/containers/js_builder/entrypoint.sh
# CMD tail -f /var/app/containers/js_builder/README_npm.md