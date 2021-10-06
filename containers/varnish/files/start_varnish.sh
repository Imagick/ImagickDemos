#!/bin/sh

varnishd -j unix,user=vcache -f /etc/varnish/default.vcl -s malloc,${CACHE_SIZE} -a0.0.0.0:80 \
	 -S /etc/varnish/secret \
    && sleep 5 \
    && varnishncsa -a -c -w /var/log/varnish/access.log -D -P /run/varnishncsa.pid \
    && tail -f /var/log/varnish/access.log
