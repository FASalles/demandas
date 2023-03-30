<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DemandsController extends Controller
{
    public function index()
    {
        $demands = Demand::all();

        return view('demands.index', compact('demands'))->with('success', 'A demanda foi criada com sucesso!');
    }

    public function create()
    {
        return view('demands.create');
    }

    public function store(Request $request)
    {
        $demand = new Demand();

        $demand->body = $request->body;
        $demand->user_id = $request->user_id;
        $demand->sector_id = $request->sector_id;
        $demand->system_id = $request->ended_at;
        $demand->demands_type_id = $request->demands_type_id;
        $demand->attached_issue = $request->attached_issue;
        $demand->budgeted_hours = $request->budgeted_hours;
        $demand->responsible_id = $request->responsible_id;
        $demand->started_at = $request->started_at;
        $demand->ended_at = $request->ended_at;

        $demand->save();

//        $data = $request->all();
//        $data['slug'] = Str::slug($data['title']);
//
//        Demand::create($data);

        return redirect()->route('demands.index');


    }
}
