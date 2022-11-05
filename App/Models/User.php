<?php

namespace App\Models;

use App\Db;
use App\Models\Model;

class User extends Model
{
    const TABLE = 'users';

    public string $email;
    public string $name;
}
