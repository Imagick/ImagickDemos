
set -e
set -x

cd /var/app

npm ci

npm run build:prod

npm run sass:build:prod

gzip -9 -c /var/app/public/css/site.css > /var/app/public/css/site.css.gz