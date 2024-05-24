#!/bin/sh

# Add this to cron
#
# */2 * * * * /usr/bin/flock -w 0 /var/home/ImagickDemos/cron.lock /bin/sh /var/home/ImagickDemos/scripts/update.sh >> /var/log/deployer/imagickdemos_deploy.log 2>&1
#
# su deployer -c 'git pull'


cd /var/home/ImagickDemos

git fetch

UPSTREAM=${1:-'@{u}'}
LOCAL=$(git rev-parse @)
REMOTE=$(git rev-parse "$UPSTREAM")
BASE=$(git merge-base @ "$UPSTREAM")

timestamp=$(date +"%Y-%m-%d_%H-%M-%S")

echo "LOCAL = ${LOCAL}";
echo "REMOTE = ${REMOTE}";
echo "BASE = ${BASE}";

if [ $LOCAL = $REMOTE ]; then
    echo "Up-to-date at ${timestamp}"
elif [ $LOCAL = $BASE ]; then
    echo "Need to pull at ${timestamp}"
    git pull
    chown -R deployer:deployer *
    sh runProd.sh
elif [ $REMOTE = $BASE ]; then
    echo "Need to push"
else
    echo "Diverged"
fi