<?php

namespace App\Repositories;

use App\Contracts\UserRepository;
use App\Models\User;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    public function model(): string
    {
        return User::class;
    }
}
