#!/usr/bin/env bash

set -e
set -x

cd /var/app

# tail -f /var/app/README.md

npm update
npm run build:dev:watch