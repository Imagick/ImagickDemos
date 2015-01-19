
environment="centos_guest"


if [ "$#" -ge 1 ]; then
    environment=$1
fi

cd ..

/usr/local/bin/php -d allow_url_fopen=1 ./lib/composer install

sudo -u imagickdemos -H sh ./scripts/deploy.sh $environment