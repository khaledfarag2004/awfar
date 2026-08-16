<?php

namespace App\Repositories\Auth;

use App\Models\User;

class AuthRepository
{
    public function findByPhone($phone)
    {
        return User::query()->where('phone', $phone)->first();
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }
}
