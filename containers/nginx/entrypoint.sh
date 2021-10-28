
set -e
set -x


ENV_TO_USE=${ENV_DESCRIPTION:=default}

echo "ENV_TO_USE is ${ENV_TO_USE}";

# Generate nginx config file for the centos,dev environment
# This is done in installer.
# php vendor/bin/configurate \
#    -p config.source.php \
#    containers/nginx/config/nginx.conf.php \
#    containers/nginx/config/nginx.conf \
#    $ENV_TO_USE

# tail -f /var/app/readme.MD
/usr/sbin/nginx -c /var/app/containers/nginx/config/nginx.conf
