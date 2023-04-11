<?php

namespace App\Data\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\User;

Class Users
{
    public function add(UserRequest $request): User
    {
        $user = new User();

        $user->name = $request->name;
        $user->login = $request->email;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return $user;
    }

    public function all()
    {
        return User::all();
    }
}
