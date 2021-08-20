
set -e

# docker-compose exec -T php_fpm sh -c "php vendor/bin/phpunit -c test/phpunit.xml --group wip"

export PHP_IDE_CONFIG="serverName=PHP_IMAGICK_DEBUG"

# php vendor/bin/phpunit -c test/phpunit.xml --group wip
php vendor/bin/phpunit -c test/phpunit.xml --no-coverage



# php vendor/bin/phpunit -c test/phpunit_integration.xml
# php vendor/bin/phpunit -c test/phpunit_database_integration.xml

# php vendor/bin/phpcov merge ./tmp/coverage --clover ./tmp/coverage/clover.xml
# php vendor/bin/phpcov merge ./tmp/coverage --html ./tmp/coverage

