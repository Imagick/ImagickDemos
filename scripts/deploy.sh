
set -eux -o pipefail

environment="centos_guest"
envSetting="dev"

if [ "$#" -ge 1 ]; then
    environment=$1
    envSetting="live"
fi

find . -name "*.sh" -exec chmod 755 {} \;

envSettingFilename="./envSetting.php"

echo "<?php" > ./envSetting.php
echo "" >> ./envSetting.php

echo "\$envSetting = [];" >> ./envSetting.php
echo "\$envSetting['${envSetting}'] = true;" >> ./envSetting.php
echo "" >> ./envSetting.php

su imagickdemos -c "./scripts/deployAsUser.sh ${environment}"

sh ./autogen/addImagickConfig.sh