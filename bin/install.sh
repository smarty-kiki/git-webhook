#!/bin/bash

ROOT_DIR="$(cd "$(dirname $0)" && pwd)"/..

ln -fs $ROOT_DIR/git_webhook.conf /etc/supervisor/conf.d/git_webhook.conf
supervisorctl update

public_ip=`curl http://ifconfig.io 2> /dev/null`
echo "http://$public_ip:12345/?name=项目名&url=项目clone_url"
