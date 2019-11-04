#!/bin/bash

sudo composer install
sudo php artisan key:generate
sudo php artisan migrate
sudo php artisan db:seed
sudo php artisan voyager:install

clear
echo "===================="
echo "=== CREATE ADMIN ==="
echo "===================="
sudo php artisan voyager:admin --create

clear
echo "==================="
echo "= FRONT-END TOOLS ="
echo "==================="
cd resources/views/themes/frostbite/assets
sudo npm install && sudo gulp css && sudo gulp lintjs
