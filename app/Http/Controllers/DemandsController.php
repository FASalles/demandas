<?php

namespace App\Http\Controllers;

use App\Data\Repositories\Demands;
use App\Data\Repositories\Sectors;
use App\Data\Repositories\Systems;
use App\Data\Repositories\Users;
use App\Http\Requests\DemandsRequest;
use App\Models\Demand;
use App\Models\Sector;
use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;

class DemandsController extends Controller
{

    public function __construct(Demand $demands, Demands $repository,
                    Users $userRepository,
                    Sectors $sectorRepository,
                    Systems $systemRepository)
    {
        $this->model = $demands;
        $this->repository = $repository;
        $this->Users = $userRepository;
        $this->Sectors = $sectorRepository;
        $this->System = $systemRepository;
    }

    public function index()
    {
        $demands = auth()->user()->demands()->orderBy('id', 'asc')->paginate(5);


        return view('demand.index', compact('demands'));
    }

    public function show($demand)
    {
        $demands = auth()->user()->demands()->orderBy('id', 'asc')->paginate(5);

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

    public function store(DemandsRequest $request)
    {

//        if($image = $request->file('image')) $demand['image'] = $image->store('image', 'public');
//
////        $ima = $request->file('image')->store('image', 'public');
//
//        $demand = new Demand();
//
//        $demand->title = $request->title;
//        $demand->body = $request->body;
//        $demand->attached_issue = $request->attached_issue;
//        $demand->budgeted_hours = $request->budgeted_hours;
//        $demand->sectors_id = $request->sectors_id;
//        $demand->users_id = $request->users_id;
//        $demand->system_id = $request->system_id;
//        $demand->demands_type_id = $request->demands_type_id;
//
//        $demand->started_at = $request->started_at;
//        $demand->ended_at = $request->ended_at;
//
//        $demand->save();

        $demand = $this->repository->add($request);

        return redirect()->route('demand.index')
            ->with('success', 'Demanda "' . $demand->title . '" criada com sucesso!');
    }

    public function edit($demand)
    {
        $demand = Demand::findOrFail($demand);

//        $sectors = Sector::all();
//        $users = User::all();
//        $systems = System::all();

        $sectors = $this->Sectors->all();
        $users = $this->Users->all();
        $systems = $this->System->all();

        return view('demand.edit', ['sectors' => $sectors,
            'users' => $users,
            'systems' => $systems], compact('demand'));

    }

    public function update(DemandsRequest $request, $id)
    {
        $demand = $this->model->findOrFail($id);

        $demand->update($request->all());

        return redirect()->route('demand.index')
            ->with('success', 'Demanda "' . $demand->title . '" editada com sucesso!');
    }

    public function destroy($demand)
    {
        $demand = $this->model->findOrFail($demand);
        $demand->delete();

        return redirect()->route('demand.index')
            ->with('success', 'Demanda "' . $demand->title . '" removida com sucesso!');
    }
}
