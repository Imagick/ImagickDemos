
environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi

#need to make dir?
mkdir -p ./var/cache
mkdir -p ./var/cache/less
chown -R imagickdemos ./var

su imagickdemos -c "./scripts/deployAsUser.sh"
sh ./autogen/addConfig.sh