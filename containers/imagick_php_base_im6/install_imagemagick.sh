

version="6.9.12-27"

im_tgz_file="ImageMagick-${version}.tar.gz"

if [ ! -f "${im_tgz_file}" ]; then
  wget "https://github.com/ImageMagick/ImageMagick6/archive/${version}.tar.gz" -O ${im_tgz_file}
fi



im_dir="ImageMagick6-${version}"

if [ ! -d "${im_dir}" ]; then
  tar xfz ${im_tgz_file}
fi

cd "${im_dir}"

./configure \
  --disable-docs \
  --with-quantum-depth=16 \
  --with-fftw \
  --with-fontconfig=yes \
  --with-jpeg=yes \
  --with-magick-plus-plus=no \
  --with-png=yes \
  --with-tiff=yes \
  --with-webp=yes \
  --without-perl

make install -j4

ldconfig /usr/local/lib