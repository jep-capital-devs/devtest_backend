
# Overview

The application has just started and our first priority is setting up a users
system to allow users to be added and then for a user to be able to view all users
in the system.

# What to Know

## Frostbite Architecture

All functionality for a Frostbite Laravel system is done in modules. We don't use
Controllers but do use Helpers. All routes are done within the web.php of each module
and will automatically register in the Laravel system.

There are 3 main folders, and 4 files, to make note of in this test.

## app/Frostbite/Test/Users

This is where the test module lives and where all of your code for the module should reside.

### Data

#### app/Frostbite/Test/Users/Data/_____FrostUsersDataCreator.php

This is where you would place any code that would create a table in the system

#### app/Frostbite/Test/Users/Helpers/FrostUsers.php

This is where you would place any code required for back-end functionality

#### app/Frostbite/Test/Users/Helpers/FrostUsers.php

If a model is decided to be needed it would be defined in this file.

#### app/Frostbite/Test/Users/web.php

Place all of your module routes here.
