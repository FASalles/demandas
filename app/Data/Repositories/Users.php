<?php

namespace App\Data\Repositories;

use App\Http\Requests\UserRequest;
use App\Models\User;
use MBarlow\Megaphone\Types\Important;
use Barryvdh\DomPDF\Facade\Pdf;

Class Users
{
    public function sendNotification($user)
    {
        $userName = request()->input('name');
        $notificationTitle = 'Criação de usuário';
        $notificationBody = 'Usuário ' . $userName  . ' criado pelo usuário: ' . auth()->user()->name;

        $notification = new Important(
            $notificationTitle,
            $notificationBody
        );

        $user = User::find(5);

        $user->notify($notification);
    }

    public function add(UserRequest $request): User
    {
        $user = new User();

        $user->name = $request->name;
        $user->login = $request->email;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        $user = User::find(5);
        $this->sendNotification($user);

        return $user;
    }

    public function all()
    {
        return User::all();
    }
}
