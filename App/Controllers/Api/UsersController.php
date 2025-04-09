<?php

namespace App\Controllers\Api;

use Models\User;

class UsersController
{
    public function __construct()
    {
        var_dump(static::class);
    }

    public function __invoke(): void
    {
        $user = new User();
    }
}