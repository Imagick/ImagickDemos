

version="7.1.0-4"

im_tgz_file="ImageMagick-${version}.tar.gz"

if [ ! -f "${im_tgz_file}" ]; then
  wget "https://github.com/ImageMagick/ImageMagick/archive/${version}.tar.gz" -O ${im_tgz_file}
fi

im_dir="ImageMagick-${version}"

if [ ! -d "${im_dir}" ]; then
  tar xfz ${im_tgz_file}
fi


cd "${im_dir}"

./configure --with-quantum-depth=16 \
           --with-magick-plus-plus=no \
           --without-perl \
           --disable-docs \
           --with-jpeg=yes \
           --with-png=yes \
           --with-fontconfig=yes \
           --with-webp=yes \
           --with-tiff=yes

make install -j4

ldconfig /usr/local/lib