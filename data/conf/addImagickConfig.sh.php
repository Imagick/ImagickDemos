<?php

$config = <<< END

rm -f /etc/nginx/sites-enabled/imagick.nginx.conf
rm -f /etc/php-fpm.d/imagick.php-fpm.conf
rm -f /etc/php-fpm.d/imagick-demos.php.fpm.ini
rm -f /etc/supervisor.d/imageTaskRunner.conf
rm -f /etc/supervisor.d/libratoStats.conf

ln -sfn ${'imagick.root.directory'}/autogen/imagick.nginx.conf /etc/nginx/sites-enabled/imagick.nginx.conf
ln -sfn ${'imagick.root.directory'}/autogen/imagick.php-fpm.conf /etc/php-fpm.d/imagick.php-fpm.conf
ln -sfn ${'imagick.root.directory'}/autogen/imagick-demos.php.fpm.ini /etc/php-fpm.d/imagick-demos.php.fpm.ini
ln -sfn ${'imagick.root.directory'}/autogen/imageTaskRunner.conf /etc/supervisord.d/imageTaskRunner.conf
ln -sfn ${'imagick.root.directory'}/autogen/libratoStats.conf /etc/supervisord.d/libratoStats.conf

END;

return $config;
