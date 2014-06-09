

mkdir imagick-demos
chown intahwebz:www-data imagick-demos

su intahwebz
git clone https://github.com/Danack/Imagick-demos imagick-demos/

cd imagick-demos
/usr/local/bin/php -d allow_url_fopen=1 ./lib/composer install 

cd tool
# /usr/local/bin/php Configurate.php amazonec2
/usr/local/bin/php Configurate.php centos_guest
/usr/local/bin/php weaveControls.php

#need to make dir?
#mkdir ../var/cache
#mkdir ../var/cache/less

/usr/local/bin/php compileLess.php

#back to root
exit 
cd ../autogen
sh addImagickConfig.sh