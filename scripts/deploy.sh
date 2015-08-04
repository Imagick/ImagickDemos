
set -x #echo on

environment="centos_guest"
envSetting="dev"

if [ "$#" -ge 1 ]; then
    environment=$1
    envSetting="live"
fi


find . -name "*.sh" -exec chmod 755 {} \;

php bin/cli.php genEnvSettings ${envSetting} /etc/profile.d/imagick.sh

su imagickdemos -c "./scripts/deployAsUser.sh ${environment}"

sh ./autogen/addImagickConfig.sh