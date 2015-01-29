
environment="centos_guest"

if [ "$#" -ge 1 ]; then
    environment=$1
fi

echo "should make them executable"
find . -name "*.sh" -exec chmod 755 {} \;

su imagickdemos -c "./scripts/deployAsUser.sh ${environment}"


sh ./autogen/addConfig.sh