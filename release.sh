#!/bin/bash

# Very hacky release script to build the dist files and copy them
# to the target production and staging Omeka sites.

set -e

# source the config file
. ./release-config.sh

node ./node_modules/gulp/bin/gulp.js dist

for site in ${STAGE_SITES[@]} ; do
    for host in ${STAGE_HOSTS[@]} ; do
        rsync -avlz --exclude .idea --exclude node_modules --exclude release.sh --exclude .git --exclude test . $host:/var/www/$site.$STAGE_DOMAIN/themes/ehri/
    done
done
for site in ${PROD_SITES[@]} ; do
    for host in ${PROD_HOSTS[@]} ; do
        rsync -avlz --exclude .idea --exclude node_modules --exclude release.sh --exclude .git --exclude test . $host:/var/www/$site.$PROD_DOMAIN/themes/ehri/
    done
done
