#!/bin/bash
set -e

# Composer Install and DB Migration
if [ ${COMPOSER_VENDOR_INSTALL} = "true" ]; then
  if [ -d ${SRC_DIR} ]; then
    cd ${SRC_DIR}
    [ -f ./composer.json ] && composer install
    if [ ${DB_MIGRATE} = "true" ]; then
      [ -f ./yii ] && sleep 10 && ./yii migrate/up --interactive=0
    fi
  fi
fi

/usr/local/bin/docker-php-entrypoint apache2-foreground