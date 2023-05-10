<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use App\Notifications\newNotification;
use MBarlow\Megaphone\Types\Important;


Route::get('/', function () {
    return view('dashboard');
});


Route::get('/en', function () {
    sendnotification();
});




function sendnotification()
{
    $notification = new Important(
        'Internet 2',
        'internet fora hoje 2'
    );

    $user = \App\Models\User::find(1);

    $user->notify($notification);
}


require __DIR__.'/demands.php';
require __DIR__.'/sectors.php';
require __DIR__.'/systems.php';
require __DIR__.'/users.php';
require __DIR__.'/breeze.php';
require __DIR__.'/auth.php';
require __DIR__.'/tools.php';

