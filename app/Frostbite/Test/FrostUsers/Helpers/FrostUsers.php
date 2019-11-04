<?php

namespace App\Frostbite\Test\Users\Helpers;

class FrostUsers
{
    public static function getUsers()
    {
        return array(
          0 => array(
            'first_name' => 'Brian',
            'last_name'  => 'Ellis',
            'age'        => 32,
            'username'   => 'brian_ellis'
          )
        );
    }

    public static function addUser()
    {
        // FUNCTION HERE. CAN BE DONE VIA MODEL OR ANOTHER LARAVEL METHOD TO
        // ADD NEW DATA TO A TABLE
        // MAKE SURE TO SEND USERS TO THE /users page when a user is added
    }
}
