

version="7.1.0-13"
# version="7.0.7-11"


im_tgz_file="ImageMagick-${version}.tar.gz"

if [ ! -f "${im_tgz_file}" ]; then
  wget "https://github.com/ImageMagick/ImageMagick/archive/${version}.tar.gz" -O ${im_tgz_file}
fi

im_dir="ImageMagick-${version}"

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