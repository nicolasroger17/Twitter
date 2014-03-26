#!/bin/sh

touch "lala.test"
export HOME=/home/pi
git --git-dir=/var/www/twitter/.git --work-tree=/var/www/twitter/ pull
git --git-dir=/var/www/twitter/.git --work-tree=/var/www/twitter/ add -A
git --git-dir=/var/www/twitter/.git --work-tree=/var/www/twitter/ commit -m "commit from server"
git --git-dir=/var/www/twitter/.git --work-tree=/var/www/twitter/ push