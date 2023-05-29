<?php

namespace App\Http\Controllers;

use App\Data\Repositories\Systems;
use App\Http\Requests\SystemRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    private $system;

    public function __construct(System $system, Systems $repository)
    {
        $this->system = $system;
        $this->repository = $repository;
    }

    public function index()
    {
        $systems = $this->system->orderBy('id', 'asc')->paginate(5);

        return view('system.index', compact('systems'));
    }

    public function show($system)
    {
        $systems = $this->system->orderBy('id', 'asc')->paginate(5);

        return view('system.index', compact('systems'));
    }

    public function create()
    {
        return view('system.form');
    }

    public function store(SystemRequest $request)
    {

        $system = $this->repository->add($request);

        return redirect()->route('system.index')
            ->with('success', 'Sistema "' . $system->name . '" criado com sucesso!');
    }

    public function edit($system)
    {
        $system = $this->system->findOrFail($system);

        return view('system.edit', compact('system'));
    }

    public function update($system, SystemRequest $request)
    {
        $system = $this->system->findOrFail($system);

        $system->name = $request->input('name');
        $system->developer = $request->input('developer');
        $system->user = $request->input('user');
        $system->laravelVersion = $request->input('laravelVersion');
        $system->otherTecs = $request->input('otherTecs');

        $system->save();

        return redirect()->route('system.index')
            ->with('success', 'Sistema "' . $system->name . '" editado com sucesso!');
    }

    public function destroy($system)
    {
        $system = $this->system->findOrFail($system);
        $system->delete();

        return redirect()->route('system.index')
            ->with('success', 'Sistema "' . $system->name . '" removido com sucesso!');
    }
}
