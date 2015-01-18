
environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi


# cd /home/imagick-demos/imagick-demos
#Run Composer install to get all the dependencies.
/usr/local/bin/php -d allow_url_fopen=1 ./lib/composer install 

#cp imagick-demos.conf.php ../imagick-demos.conf.php
#Put some real values in the config

#Generate the config files for nginx, etc.


cd tool
# /usr/local/bin/php Configurate.php amazonec2
/usr/local/bin/php Configurate.php $environment
/usr/local/bin/php weaveControls.php

#need to make dir?
#mkdir ../var/cache
#mkdir ../var/cache/less

#Generate the CSS
/usr/local/bin/php compileLess.php

#back to root
#exit 

cd ../autogen

#Link the generated config files so that they can be found by nginx etc.
sh addImagickConfig.sh

#restart the services that serve the website.
#/etc/init.d/php-fpm restart
#nginx -s reload
#/etc/init.d/supervisord restart