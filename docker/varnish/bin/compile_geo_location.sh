

# https://github.com/fgsch/libvmod-geoip2

# https://github.com/maxmind/libmaxminddb

apt-get update

apt-get install -y varnish git-core libvarnishapi-dev libmaxminddb-dev apt-transport-https libtool automake make build-essential pkg-config python-docutils

export PKG_CONFIG_PATH=/usr/lib/x86_64-linux-gnu/pkgconfig


cd /var/app/docker/varnish/libvmod-geoip2-master

./autogen.sh
./configure
make
make install

libgeoip1
geoip-bin


cd /usr/share/GeoIP/
cp GeoIP.dat GeoIP.dat.old
wget -O GeoIP.dat.gz http://geolite.maxmind.com/download/geoip/database/GeoLiteCountry/GeoIP.dat.gz
gunzip GeoIP.dat.gz


http://geolite.maxmind.com/download/geoip/database/GeoLite2-Country.tar.gz