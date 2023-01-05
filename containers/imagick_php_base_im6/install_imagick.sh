
set -e
set -x


# version="3.5.1"
# im_tgz_file="imagick-${version}.tgz"

if [ ! -d "${im_dir}" ]; then
  wget "https://github.com/Imagick/imagick/archive/refs/heads/master.tar.gz" -O imagick-master.tar.gz
fi

if [ ! -d "imagick-master" ]; then
  tar xzf imagick-master.tar.gz
fi

cd imagick-master

phpize

./configure --with-imagick=/usr/im6

make install -j4

echo "extension=imagick.so" > /etc/php/8.0/cli/conf.d/imagick.ini
echo "extension=imagick.so" > /etc/php/8.0/fpm/conf.d/imagick.ini