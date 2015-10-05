<?php

$config = <<< END

rm -f /etc/nginx/sites-enabled/${'app_name'}.nginx.conf
rm -f /etc/php-fpm.d/${'app_name'}.php-fpm.conf
rm -f /etc/php-fpm.d/${'app_name'}.php.fpm.ini
rm -f /etc/supervisor.d/${'app_name'}_imageGenerator.conf
rm -f /etc/supervisor.d/${'app_name'}_statsUploaded.conf

ln -sfn ${'imagick_root_directory'}/autogen/nginx.conf /etc/nginx/sites-enabled/${'app_name'}.nginx.conf
ln -sfn ${'imagick_root_directory'}/autogen/php-fpm.conf /etc/php-fpm.d/${'app_name'}.php-fpm.conf
ln -sfn ${'imagick_root_directory'}/autogen/php.fpm.ini /etc/php-fpm.d/imagick-demos.php.fpm.ini
ln -sfn ${'imagick_root_directory'}/autogen/imageGenerator.conf /etc/supervisord.d/${'app_name'}_imageGenerator.conf
ln -sfn ${'imagick_root_directory'}/autogen/statsUploader.conf /etc/supervisord.d/${'app_name'}_statsUploader.conf

END;

return $config;
