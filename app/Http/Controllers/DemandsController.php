<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;

class DemandsController extends Controller
{
    public function index()
    {
        $demands = Demand::paginate(5);

        return view('demands.index', compact('demands'));
    }

    public function create()
    {
        return view('demands.form');
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

        return redirect()->route('demands.index');
    }

    public function edit($demand)
    {
        return $demand;
    }
}
