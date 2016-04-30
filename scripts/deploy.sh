
set -eux -o pipefail

environment="centos_guest,dev,debug"

if [ "$#" -ge 1 ]; then
    environment=$1
fi

find . -name "*.sh" -exec chmod 755 {} \;

envSettingFilename="./envSetting.php"

echo "<?php" > ./envSetting.php
echo "" >> ./envSetting.php
echo "\$envSetting = [];" >> ./envSetting.php

IFS=', ' read -a array <<< "$environment"
for element in "${array[@]}"
do
    echo "\$envSetting['${element}'] = true;" >> ./envSetting.php
done

echo "" >> ./envSetting.php
echo "return \$envSetting;" >> ./envSetting.php
echo "" >> ./envSetting.php

su imagickdemos -c "./scripts/deployAsUser.sh ${environment}"

sh ./autogen/addConfig.sh