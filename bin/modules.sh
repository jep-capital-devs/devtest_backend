#!/bin/bash

cd ..
php artisan migrate --path="application/app/Frostbite/Test/FrostUsers/Data/_____FrostUsersDataCreator.php"
php artisan cache:clear
