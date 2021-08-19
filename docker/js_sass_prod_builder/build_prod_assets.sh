
set -e
set -x

cd /var/app/app

npm ci

npm run build

# npm run sass:build:prod
# gzip -9 -c /var/app/app/public/css/site.css > /var/app/app/public/css/site.css.gz

gzip -9 -c /var/app/public/css/imagick.css > /var/app/public/css/imagick.css.gz
