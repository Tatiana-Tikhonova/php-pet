<?php
require __DIR__ . '/autoload.php';

use App\Models\User;

$users = User::getAll();
$user = User::getById(1);
echo '<pre>';
print_r($user);
echo '</pre>';
