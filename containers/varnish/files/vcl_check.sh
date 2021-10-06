#!/bin/bash
tmpfile=$(mktemp)
tmpdir=$(mktemp -d)
trap 'rm -rf $tmpfile $tmpdir' 0
/usr/sbin/varnishd -n $tmpdir -C -f $1 2> $tmpfile
errcode=$?
echo

if [ $errcode -ne 0 ]; then
    echo "VCL file: $1"
    echo "ERROR: There are errors in the varnish configuration."
    cat $tmpfile
    exit $errcode
else
    echo "VCL file: $1"
    echo "ok."
    exit 0
fi
