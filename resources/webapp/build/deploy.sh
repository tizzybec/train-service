#!/bin/bash

ROOTPATH=$(pwd)
BUILDPATH="${ROOTPATH}/deploy/bootplate/build"
DEPLOYPATH=~/Projects/CodeIgniter/resources/webapp/build/
VIEWPATH=~/Projects/CodeIgniter/application/views/mobile/

#build the project
./tools/deploy.sh

echo 'start deploy...'
cd $BUILDPATH
echo "running in  `pwd`"
sed -i 's/\.\.\/source/\.\./g' app.css
sed -n '/\.\.\/source/p' app.css
cp -r ./* $DEPLOYPATH
cat enyo.js app.js > ${VIEWPATH}app_js.php
cat enyo.css app.css > ${VIEWPATH}app_css.php
echo "copy files to $DEPLOYPATH"
echo 'deploy complete...'

exit 0
