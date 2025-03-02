<?php

namespace App\Services\User;



use App\Models\User;

class UserService
{
    public static function store(array $data)
    {
        return User::create($data);
    }

    public static function update(array $data)
    {
        $user = User::self()->first();
        $user -> update($data);
        return $user-> fresh();

    }

    public static function destroy(): void
    {
        $user = User::self()->first();
        $user->delete();
    }

}
