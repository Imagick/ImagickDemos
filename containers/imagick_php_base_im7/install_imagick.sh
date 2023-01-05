
set -e
set -x

if [ ! -d "${im_dir}" ]; then
  echo "Directory didn't exist, cloning imagick"
  wget "https://github.com/Imagick/imagick/archive/refs/heads/master.tar.gz" -O imagick-master.tar.gz
fi

if [ ! -d "imagick-master" ]; then
  tar xzf imagick-master.tar.gz
fi

cd imagick-master

phpize

./configure --with-imagick=/usr/im7

echo "************************************"
echo "***DIR******************************"
pwd
echo "************************************"
echo "************************************"

make install -j8

echo "extension=imagick.so" > /etc/php/8.0/cli/conf.d/imagick.ini
echo "extension=imagick.so" > /etc/php/8.0/fpm/conf.d/imagick.ini