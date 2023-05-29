<?php

namespace App\Data\Repositories;

use App\Http\Requests\SectorRequest;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MBarlow\Megaphone\Types\Important;

class Sectors
{
    public function sendNotification($sector)
    {
        $sectorName = request()->input('name');
        $notificationTitle = 'Criação de setor';
        $notificationBody = 'Setor ' . $sectorName  . ' criado pelo usuário: ' . auth()->user()->name;

        $notification = new Important(
            $notificationTitle,
            $notificationBody
        );

        $user = User::find(5);

        $user->notify($notification);
    }

    public function newQuery(): Builder
    {
        return app(Builder::class)->newQuery();
    }

    public function add(SectorRequest $request): Sector
    {
        $sector = new Sector();

        $sector->name = $request->name;
        $sector->user = $request->user;
        $sector->created_at = $request->created_at;
        $sector->updated_at = $request->updated_at;

        $sector->save();

        $user = User::find(5);
        $this->sendNotification($user);

        return $sector;
    }

    public function all()
    {
        return Sector::all();
    }
}
