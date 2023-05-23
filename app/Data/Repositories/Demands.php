<?php

namespace App\Data\Repositories;

use App\Http\Requests\DemandsRequest;
use App\Models\Demand;
use Illuminate\Support\Facades\Notification;
use MBarlow\Megaphone\Types\Important;
use App\Models\User;

Class Demands
{
    public function sendNotification($user_id)
    {
        $notificationTitle = request()->input('title');
        $notificationBody = request()->input('body');

        $notification = new Important(
            $notificationTitle,
            $notificationBody
        );

        $user = User::find($user_id);

        $user->notify($notification);
    }

    public function add(DemandsRequest $request): Demand
    {
        $demand = new Demand();

        $demand->title = $request->title;
        $demand->body = $request->body;
        $demand->attached_issue = $request->attached_issue;
        $demand->budgeted_hours = $request->budgeted_hours;
        $demand->sectors_id = $request->sectors_id;
        $demand->users_id = $request->users_id;
        $demand->system_id = $request->system_id;
        $demand->demands_type_id = $request->demands_type_id;

        $demand->started_at = $request->started_at;
        $demand->ended_at = $request->ended_at;

        if($image = $request->file('image')) $demand['image'] = $image->store('image', 'public');

        $demand->save();

        $user_id = $request->input('users_id');
        $this->sendNotification($user_id);



        return $demand;
    }
}
