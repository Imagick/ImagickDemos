FROM debian:9

RUN apt-get update -qq \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y varnish libmaxminddb0

COPY files/start_varnish.sh /usr/local/bin/start_varnish.sh
COPY files/vcl_check.sh /usr/local/bin/vcl_check.sh
COPY lib/libvmod_geoip2.la /usr/lib/x86_64-linux-gnu/varnish/vmods/libvmod_geoip2.la
COPY lib/libvmod_geoip2.so /usr/lib/x86_64-linux-gnu/varnish/vmods/libvmod_geoip2.so
RUN mkdir -p /usr/local/etc/GeoLite2-Country
COPY files/GeoLite2-Country_20170606 /usr/local/etc/GeoLite2-Country

CMD ["/usr/local/bin/start_varnish.sh"]
