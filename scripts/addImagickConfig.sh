
#ln -s /home/github/imagick-demos/autogen/imagick.nginx.conf /etc/nginx/sites-enabled/imagick.nginx.conf
#ln -s /home/github/imagick-demos/autogen/imagick.php-fpm.conf /etc/php-fpm.d/imagick.php-fpm.conf
#ln -s /home/github/imagick-demos/autogen/imagick-demos.php.fpm.ini /etc/php-fpm.d/imagick.nginx.conf


rm /etc/nginx/sites-enabled/imagick.nginx.conf
rm /etc/php-fpm.d/imagick.php-fpm.conf
rm /etc/php-fpm.d/imagick-demos.php.fpm.ini
rm /etc/supervisord.d/imageTaskRunner.conf

ln -s /home/github/imagick-demos/imagick-demos/autogen/imagick.nginx.conf /etc/nginx/sites-enabled/imagick.nginx.conf
ln -s /home/github/imagick-demos/imagick-demos/autogen/imagick.php-fpm.conf /etc/php-fpm.d/imagick.php-fpm.conf
ln -s /home/github/imagick-demos/imagick-demos/autogen/imagick-demos.php.fpm.ini /etc/php-fpm.d/imagick-demos.php.fpm.ini
ln -s /home/github/imagick-demos/imagick-demos/autogen/imageTaskRunner.conf /etc/supervisord.d/imageTaskRunner.conf
