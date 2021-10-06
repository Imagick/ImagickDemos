#!/usr/bin/env bash

set -e
set -x

cd /var/app

npm update

npm run build:dev:watch