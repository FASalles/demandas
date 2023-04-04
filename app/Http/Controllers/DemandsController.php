<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Sector;
use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;

class DemandsController extends Controller
{
    public function index()
    {
        $demands = Demand::orderBy('id', 'asc')->paginate(5);

        return view('demand.index', compact('demands'));
    }

    public function create()
    {
        $sectors = Sector::all();
        $users = User::all();
        $systems = System::all();

        return view('demand.form', ['sectors' => $sectors,
                                        'users' => $users,
                                        'systems' => $systems]);
    }

    public function store(Request $request)
    {
        $demand = new Demand();

        $demand->title = $request->title;
        $demand->body = $request->body;
        $demand->attached_issue = $request->attached_issue;
        $demand->budgeted_hours = $request->budgeted_hours;
        $demand->sector_id = $request->sector_id;
        $demand->user_id = $request->user_id;
        $demand->system_id = $request->system_id;
        $demand->demands_type_id = $request->demands_type_id;

        $demand->started_at = $request->started_at;
        $demand->ended_at = $request->ended_at;

        $demand->save();

        return redirect()->route('demand.index');
    }

    public function edit($demand)
    {
        $demand = Demand::findOrFail($demand);

        return view('demand.edit', compact('demand'));
    }

    public function update($demand)
    {
        $demands = Demand::all();

        $demand = Demand::findOrFail($demand);

        $demand->update(request()->all());

        return redirect()->route('demand.index')
            ->with('success', 'Demanda "' . $demand->name . '" editada com sucesso!');
        //return view('demand.index', compact('demand'));
    }

    public function destroy($demand)
    {
        $demand = Demand::findOrFail($demand);
        $demand->delete();

        return redirect()->route('demand.index')
            ->with('success', 'Demanda "' . $demand->title . '" removida com sucesso!');
    }
}
