set -eux -o pipefail

dev_environment="centos_guest,dev"
environment="$dev_environment"

if [ "$#" -ge 1 ]; then
    environment=$1
fi

echo "environment is ${environment}";

if [ "${environment}" != "${dev_environment}" ]; then
    imagickdemos_github_access_token=`php bin/info.php "github.access_token"`
    [ -z "${imagickdemos_github_access_token}" ] && echo "Need to set imagickdemos_github_access_token" && exit 1;
    composer config -g github-oauth.github.com ${imagickdemos_github_access_token}
    #Run Composer install to get all the dependencies.
    php -d allow_url_fopen=1 /usr/sbin/composer install --no-interaction --prefer-dist
fi


#Generate the config files for nginx, etc.
mkdir -p autogen
vendor/bin/configurate -p data/config.php data/config_template/imageGenerator.conf.php autogen/imageGenerator.conf $environment
vendor/bin/configurate -p data/config.php data/config_template/statsUploader.conf.php autogen/statsUploader.conf $environment
vendor/bin/configurate -p data/config.php data/config_template/nginx.conf.php autogen/nginx.conf $environment
vendor/bin/configurate -p data/config.php data/config_template/php-fpm.conf.php autogen/php-fpm.conf $environment
vendor/bin/configurate -p data/config.php data/config_template/php.ini.php autogen/php.ini $environment
vendor/bin/configurate -p data/config.php data/config_template/addConfig.sh.php autogen/addConfig.sh $environment

#generate the config for the appliction
vendor/bin/genenv -p data/config.php data/envRequired.php autogen/appEnv.php $environment

#convert the php ini file to php-fpm format
vendor/bin/fpmconv autogen/php.ini autogen/php.fpm.ini 

#Generate some code.
php ./tool/weaveControls.php

#Generate the CSS
mkdir -p ./var/cache/less
php ./tool/compileLess.php

php bin/cli.php clearRedis

#todo - make everything other than var be not writable 