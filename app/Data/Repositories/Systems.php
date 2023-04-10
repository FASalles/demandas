<?php

namespace App\Data\Repositories;

use App\Http\Requests\SystemRequest;
use App\Models\System;

Class Systems
{
    public function add(SystemRequest $request): System
    {
        $system = new System();

        $system->name = $request->name;
        $system->created_at = $request->created_at;
        $system->updated_at = $request->updated_at;

        $system->save();

        return $system;
    }
}
