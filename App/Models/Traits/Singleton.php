<?php

namespace App\Models\Traits;

trait Singleton
{
    public $counter;
    protected static $unique;

    protected function __construct()
    {
    }
    public static function unique(): ?object
    {
        if (null === static::$unique) {
            static::$unique = new static;
        }
        return static::$unique;
    }
}
