<?php

namespace App\Models;

use App\Db;

/**
 * Model - abstract parent class for other classes
 */
abstract class Model
{
    const TABLE = '';
    /**
     * getAll
     *
     * @return array
     */
    public static function getAll()
    {
        $db = new Db();
        return $db->getDataObj(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }
}
