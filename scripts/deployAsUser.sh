environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi

echo "environment is ${environment}";

if [ "${environment}" -ne "centos_guest" ]; then
    #Run Composer install to get all the dependencies.
    /usr/local/bin/php -d allow_url_fopen=1 /usr/sbin/composer install
fi

#need to make dir?
mkdir -p ./var/cache/less
#chown -R imagickdemos ./var

#Generate the config files for nginx, etc.
/usr/local/bin/php bin/cli.php configurate $environment
#Generate some code.
/usr/local/bin/php ./tool/weaveControls.php
#Generate the CSS
/usr/local/bin/php ./tool/compileLess.php


#todo - make everything other than var be not writable 