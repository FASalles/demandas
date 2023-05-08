<?php

namespace App\Data\Repositories;

use App\Http\Requests\DemandsRequest;
use App\Models\Demand;

Class Demands
{
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

//        $demand = $request->all();

        if($image = $request->file('image')) $demand['image'] = $image->store('image', 'public');

        $demand->save();

        if($image = $request->file('image')) $demand->image = $image->store('image', 'public');

        return $demand;
    }
}
