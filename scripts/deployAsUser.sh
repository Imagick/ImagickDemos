set -eux -o pipefail

environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi

echo "environment is ${environment}";

set +x
#avoid logging secrets
source /etc/profile.d/env_imagickdemos.sh
set -x

if [ "${environment}" != "centos_guest" ]; then
    [ -z "${imagickdemos_github_access_token}" ] && echo "Need to set imagickdemos_github_access_token" && exit 1;
    composer config -g github-oauth.github.com ${imagickdemos_github_access_token}
    #Run Composer install to get all the dependencies.
    php -d allow_url_fopen=1 /usr/sbin/composer install --no-interaction --prefer-dist
fi

#need to make dir?
mkdir -p ./var/cache/less

mkdir -p autogen

#Generate the config files for nginx, etc.
vendor/bin/configurate -p data/config.php data/conf/imageTaskRunner.conf.php autogen/imageTaskRunner.conf $environment
vendor/bin/configurate -p data/config.php data/conf/libratoStats.conf.php autogen/libratoStats.conf $environment
vendor/bin/configurate -p data/config.php data/conf/imagick.nginx.conf.php autogen/imagick.nginx.conf $environment
vendor/bin/configurate -p data/config.php data/conf/imagick.php-fpm.conf.php autogen/imagick.php-fpm.conf $environment
vendor/bin/configurate -p data/config.php data/conf/imagick-demos.php.ini.php autogen/imagick-demos.php.ini $environment
vendor/bin/configurate -p data/config.php data/conf/addImagickConfig.sh.php autogen/addImagickConfig.sh $environment

vendor/bin/fpmconv autogen/imagick-demos.php.ini autogen/imagick-demos.php.fpm.ini 

#Generate some code.
php ./tool/weaveControls.php
#Generate the CSS
php ./tool/compileLess.php

php bin/cli.php clearRedis


#todo - make everything other than var be not writable 