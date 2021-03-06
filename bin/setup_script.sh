#!/bin/bash

cd ..

ISROOTDIR=app/Frostbite/frostbite.config
if test -f "$ISROOTDIR"; then
  composer install
  php artisan key:generate
  php artisan migrate
  php artisan db:seed
  php artisan voyager:install

  clear
  echo "===================="
  echo "=== CREATE ADMIN ==="
  echo "===================="
  php artisan voyager:admin --create

  clear
  echo "==================="
  echo "= FRONT-END TOOLS ="
  echo "==================="
  cd resources/views/themes/frostbite/assets
  npm install && gulp css && gulp lintjs

  echo "INSTALL FINISHED. YOU CAN BEGIN WORKING NOW!"
else
  echo "You need to be in a Frostbite application root directory before continuing"
  exit 1
fi
