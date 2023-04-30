<?php

namespace App\Data\Repositories;

use App\Http\Requests\SectorRequest;
use App\Models\Sector;
use Illuminate\Database\Eloquent\Builder;

class Sectors
{
    public function newQuery(): Builder
    {
        return app(Builder::class)->newQuery();
    }

    public function add(SectorRequest $request): Sector
    {
        $sector = new Sector();

        $sector->name = $request->name;
        $sector->created_at = $request->created_at;
        $sector->updated_at = $request->updated_at;

        $sector->save();

        return $sector;
    }

    public function all()
    {
        return Sector::all();
    }
}
