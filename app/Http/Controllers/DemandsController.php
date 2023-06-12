<?php

namespace App\Http\Controllers;

use App\Data\Repositories\Demands;
use App\Data\Repositories\Sectors;
use App\Data\Repositories\Systems;
use App\Data\Repositories\Users;
use App\Http\Requests\DemandsRequest;
use App\Mail\Contact;
use App\Models\Demand;
use App\Models\Sector;
use App\Models\System;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

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
        if (auth()->user()->isAn('admin')) {
            $demands = Demand::orderBy('id', 'asc')->paginate(5);
        } else {
            $demands = auth()->user()->demands()->orderBy('id', 'asc')->paginate(5);
        }

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
        $demands = Demand::all();

        return view('demand.form', ['sectors' => $sectors,
                                        'users' => $users,
                                        'systems' => $systems,
                                        'demands' => $demands]);
    }

    public function store(DemandsRequest $request)
    {

        $demand = $this->repository->add($request);

        return redirect()->route('demand.index')
            ->with('success', 'Demanda "' . $demand->title . '" criada com sucesso!');

    }

    public function edit($demand)
    {
        $demand = Demand::findOrFail($demand);


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
