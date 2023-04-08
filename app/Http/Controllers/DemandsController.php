<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Sector;
use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;

class DemandsController extends Controller
{
    private $demand;

    public function __construct(Demand $demand)
    {
        $this->demand = $demand;
    }

    public function index(Demand $demand)
    {
        $demands = $this->demand->orderBy('id', 'asc')->paginate(5);

        return view('demand.index', compact('demands'));
    }

    public function show($demand)
    {
        $demands = $this->demand->orderBy('id', 'asc')->paginate(5);

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
        $demand = $this->demand->findOrFail($demand);

        $sectors = Sector::all();
        $users = User::all();
        $systems = System::all();

        return view('demand.edit', ['sectors' => $sectors,
            'users' => $users,
            'systems' => $systems], compact('demand'));

    }

    public function update(Request $request, $id)
    {
        $demand = $this->demand->findOrFail($id);

        $demand->update($request->all());

        return redirect()->route('demand.index')
            ->with('success', 'Demanda "' . $demand->title . '" editada com sucesso!');
    }

    public function destroy($demand)
    {
        $demand = $this->demand->findOrFail($demand);
        $demand->delete();

        return redirect()->route('demand.index')
            ->with('success', 'Demanda "' . $demand->title . '" removida com sucesso!');
    }
}
