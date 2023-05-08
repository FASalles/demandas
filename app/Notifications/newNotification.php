<?php

namespace App\Notifications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use MBarlow\Megaphone\Types\BaseAnnouncement;
use Illuminate\Notifications\Notifiable;
use MBarlow\Megaphone\Types\Important;
use App\Models\User;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use MBarlow\Megaphone\HasMegaphone;

class newNotification extends BaseAnnouncement

{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndAbilities, HasMegaphone;

    public function sendnotification()
    {
        $notification = new Important(
            'Internet',
            'internet fora hoje'
        );

        $user = \App\Models\User::first();

        $user->notify(new newNotification());
    }
}
