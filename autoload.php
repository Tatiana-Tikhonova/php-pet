<?php

/**
 * Classes autoload function
 * @param  string $class - class name
 */
spl_autoload_register(function ($class) {

    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($file)) {
        include $file;
    }
});
