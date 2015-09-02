# make errors error

set -eux -o pipefail
shopt -s failglob

# Generate the env settings file
php bin/cli.php genConfSettings dev

# reload it.
#set +u
#source ~/.bashrc
#source ~/.bash_profile
#set -u

#restart PHP-FPM
/etc/init.d/php-fpm restart