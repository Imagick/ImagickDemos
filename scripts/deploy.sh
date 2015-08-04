
set -x #echo on

environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi


find . -name "*.sh" -exec chmod 755 {} \;

php bin/cli.php genEnvSettings dev /etc/profile.d/imagick.sh

su imagickdemos -c "./scripts/deployAsUser.sh ${environment}"

sh ./autogen/addImagickConfig.sh