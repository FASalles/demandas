<?php

namespace App\Data\Repositories;

use App\Http\Requests\SystemRequest;
use App\Models\System;
use App\Models\User;
use MBarlow\Megaphone\Types\Important;

Class Systems
{
    public function sendNotification($system)
    {
        $systemName = request()->input('name');
        $notificationTitle = 'Criação de sistema';
        $notificationBody = 'Sistema ' . $systemName  . ' criado pelo usuário: ' . auth()->user()->name;

        $notification = new Important(
            $notificationTitle,
            $notificationBody
        );

        $user = User::find(5);

        $user->notify($notification);
    }

    public function add(SystemRequest $request): System
    {
        $system = new System();

        $system->name = $request->name;
        $system->developer = $request->developer;
        $system->user = $request->user;
        $system->laravelVersion = $request->laravelVersion;
        $system->otherTecs = $request->otherTecs;
        $system->created_at = $request->created_at;
        $system->updated_at = $request->updated_at;

        $system->save();

        $user = User::find(5);
        $this->sendNotification($user);

        return $system;
    }

    public function all()
    {
        return System::all();
    }
}
