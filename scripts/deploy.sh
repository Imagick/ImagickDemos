
# This script assumes that there is already a user called 'intahwebz' that 
# belongs to the 'www-data' group

# Create a directory for the files to live in
cd /home
mkdir imagick-demos
chown intahwebz:www-data imagick-demos

#Become the user the files will be run under
su intahwebz

#Get the files
git clone https://github.com/Danack/Imagick-demos imagick-demos/

#Run Composer install to get all the dependencies.
cd imagick-demos
/usr/local/bin/php -d allow_url_fopen=1 ./lib/composer install 


#cp imagick-demos.conf.php ../imagick-demos.conf.php
#Put some real values in the config


#Generate the config files for nginx, etc.
cd tool
# /usr/local/bin/php Configurate.php amazonec2
/usr/local/bin/php Configurate.php centos_guest
/usr/local/bin/php weaveControls.php

#need to make dir?
#mkdir ../var/cache
#mkdir ../var/cache/less

#Generate the CSS
/usr/local/bin/php compileLess.php

#back to root
exit 
cd ../autogen

#Link the generated config files so that they can be found by nginx etc.
sh addImagickConfig.sh



#restart the services that serve the website.
/etc/init.d/php-fpm restart
nginx -s reload
/etc/init.d/supervisord restart