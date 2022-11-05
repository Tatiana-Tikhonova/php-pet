<?php

namespace App\Models;

use App\Db;

class User
{
    public string $email;
    public string $name;
    public static function findAll()
    {
        $db = new Db();
        return $db->getDataObj(
            'SELECT * FROM users',
            'App\Models\User'
        );
    }
}
