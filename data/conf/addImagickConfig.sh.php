<?php

$config = <<< END

rm -f /etc/nginx/sites-enabled/imagick.nginx.conf
rm -f /etc/php-fpm.d/imagick.php-fpm.conf
rm -f /etc/php-fpm.d/imagick-demos.php.fpm.ini
rm -f /etc/supervisor.d/imageTaskRunner.conf
rm -f /etc/supervisor.d/libratoStats.conf


ln -s ${'imagick.root.directory'}/autogen/imagick.nginx.conf /etc/nginx/sites-enabled/imagick.nginx.conf
ln -s ${'imagick.root.directory'}/autogen/imagick.php-fpm.conf /etc/php-fpm.d/imagick.php-fpm.conf
ln -s ${'imagick.root.directory'}/autogen/imagick-demos.php.fpm.ini /etc/php-fpm.d/imagick-demos.php.fpm.ini
ln -s ${'imagick.root.directory'}/autogen/imageTaskRunner.conf /etc/supervisor.d/imageTaskRunner.conf
ln -s ${'imagick.root.directory'}/autogen/libratoStats.conf /etc/supervisor.d/libratoStats.conf

END;

return $config;
