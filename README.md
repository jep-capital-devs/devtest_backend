
# Overview

The application has just started and our first priority is setting up a users
system to allow users to be added and then for a user to be able to view all users
in the system.

# You will need to

* Create a fresh database
* serve your application locally however you see fit
* update the .env file to allow the application to work
* run setup_script.sh located in the bin directory (do not move this file anywhere).
* Navigate to http://YOUR_URL/admin/themes
* You will be prompted to login, once done activate the theme
* Begin working on the site

## Troubleshooting

If you run into:
__No hint path defined for [theme].__

* Navigate to http://YOUR_URL.com/admin/themes
* You will be prompted to login, once done activate the theme

# What to Know

We use Laravel Valet to locally serve our applications but feel free to locally
serve the test application however you feel. We just find it easiest for us.

## Frostbite Architecture

All functionality for a Frostbite Laravel system is done in modules. We don't use
Controllers but do use Helpers. All routes are done within the web.php of each module
and will automatically register in the Laravel system.

There are 3 main folders, and 4 files, to make note of in this test.

## app/Frostbite/Test/Users

This is where the test module lives and where all of your code for the module should reside.


### app/Frostbite/Test/Users/Data/_____FrostUsersDataCreator.php

This is where you would place any code that would create a table in the system

### app/Frostbite/Test/Users/Helpers/FrostUsers.php

This is where you would place any code required for back-end functionality

### app/Frostbite/Test/Users/Helpers/FrostUsers.php

If a model is decided to be needed it would be defined in this file.

### app/Frostbite/Test/Users/web.php

Place all of your module routes here.

## Front-end User Interaction

All pages for the Laravel App's Front-End user interaction can be found here:

__resources/views/themes/frostbite/blade/page__
