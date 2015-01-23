
environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi

echo "environment is ${environment}";

#Run Composer install to get all the dependencies.
/usr/local/bin/php -d allow_url_fopen=1 /usr/lib/composer install 

#cp imagick-demos.conf.php ../imagick-demos.conf.php
#Put some real values in the config

#Generate the config files for nginx, etc.
/usr/local/bin/php bin/cli.php configurate $environment

/usr/local/bin/php ./tool/weaveControls.php

#need to make dir?
mkdir -p ./var/cache
mkdir -p ./var/cache/less

#Generate the CSS
/usr/local/bin/php ./tool/compileLess.php

#back to root
exit 

cd ../autogen

#Link the generated config files so that they can be found by nginx etc.
sh addImagickConfig.sh