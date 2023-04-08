<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    private $system;

    public function __construct(System $system)
    {
        $this->system = $system;
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
        $system = new System();

        $system->name = $request->name;
        $system->created_at = $request->created_at;
        $system->updated_at = $request->updated_at;

        $system->save();

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

        $system->update($request->all());

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
