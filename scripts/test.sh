
set -x
shopt -s failglob

for i in /etc/profile.d/*.sh; do
    if [ -r "$i" ]; then
        echo $i
    fi
done
