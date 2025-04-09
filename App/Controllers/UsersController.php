<?php
namespace App\Controllers;
use Models\User;

class UsersController
{
    public function __construct()
    {
        var_dump(static::class);
        echo "<br>";
    }

    public function __invoke(): void
    {
        $user = new User();
    }
}