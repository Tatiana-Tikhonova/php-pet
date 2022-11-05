<?php
require __DIR__ . '/autoload.php';

use App\Models\User;

$users = User::getAll();

echo '<pre>';
print_r($users);
echo '</pre>';
