
set -e
set -x


ENV_TO_USE=${ENV_DESCRIPTION:=default}

echo "ENV_TO_USE is ${ENV_TO_USE}";

# php composer.phar update
php composer.phar install

# Generate config settings used per environment
 php vendor/bin/configurate \
    -p config.source.php \
    autoconf.source.php \
    autoconf.php \
    $ENV_TO_USE


php vendor/bin/configurate \
    -p config.source.php \
    containers/nginx/config/nginx.conf.php \
    containers/nginx/config/nginx.conf \
    $ENV_TO_USE


# Generate config settings used per environment
php vendor/bin/classconfig \
    -p config.source.php \
    "ImagickDemo\\Config" \
    config.generated.php \
    $ENV_TO_USE


# php cli.php misc:wait_for_db

# php vendor/bin/phinx migrate -e internal

# sh buildSassToCss.sh

# php cli.php seed:initial


#Generate some code.
# php ./tool/weaveControls.php

#Generate the CSS
# mkdir -p ./var/cache/less
#php ./tool/compileLess.php

# php cli.php clearRedis

echo "Installer is finished, site should be available."