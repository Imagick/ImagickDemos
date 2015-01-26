
environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi

su imagickdemos -c "./scripts/deployAsUser.sh"
sh ./autogen/addConfig.sh