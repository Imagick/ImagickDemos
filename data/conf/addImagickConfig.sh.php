<?php

$config = <<< END

ln -s ${'imagick.root.directory'}/autogen/imagick.nginx.conf /etc/nginx/sites-enabled/imagick.nginx.conf
ln -s ${'imagick.root.directory'}/autogen/imagick.php-fpm.conf /etc/php-fpm.d/imagick.php-fpm.conf
ln -s ${'imagick.root.directory'}/autogen/imagick-demos.php.fpm.ini /etc/php-fpm.d/imagick-demos.php.fpm.ini

END;

return $config;
