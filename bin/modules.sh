#!/bin/bash

cd ..
php artisan migrate --path="app/Frostbite/Test/FrostUsers/Data/_____FrostUsersDataCreator.php"
php artisan cache:clear
