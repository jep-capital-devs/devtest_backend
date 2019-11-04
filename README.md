
# Overview

The application has just started and our first priority is setting up a users
system to allow users to be added and then for a user to be able to view all users
in the system.

# What to Know

## Frostbite Architecture

All functionality for a Frostbite Laravel system is done in modules. We don't use
Controllers but do use Helpers. All routes are done within the web.php of each module
and will automatically register in the Laravel system.
