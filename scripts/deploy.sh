
environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi


find . -name "*.sh" -exec chmod 755 {} \;

su imagickdemos -c "./scripts/deployAsUser.sh ${environment}"


sh ./autogen/addImagickConfig.sh