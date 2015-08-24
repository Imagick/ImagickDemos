
set -eux -o pipefail

environment="centos_guest"
envSetting="dev"

if [ "$#" -ge 1 ]; then
    environment=$1
    envSetting="live"
fi

find . -name "*.sh" -exec chmod 755 {} \;

su imagickdemos -c "./scripts/deployAsUser.sh ${environment}"

sh ./autogen/addImagickConfig.sh