<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectorRequest;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::orderBy('id', 'asc')->paginate(5);

        return view('sector.index', compact('sectors'));
    }

    public function show($sector)
    {
        $sectors = Sector::orderBy('id', 'asc')->paginate(5);

        return view('sector.index', compact('sectors'));
    }

    public function create()
    {
        return view('sector.form');
    }

    public function store(SectorRequest $request)
    {
        $sector = new Sector();

        $sector->name = $request->name;
        $sector->created_at = $request->created_at;
        $sector->updated_at = $request->updated_at;

        $sector->save();

        return redirect()->route('sector.index')
            ->with('success', 'Setor "' . $sector->name . '" criado com sucesso!');
    }

    public function edit($sector)
    {
        $sector = Sector::findOrFail($sector);

        return view('sector.edit', compact('sector'));
    }


    public function update($sector, SectorRequest $request)
    {
        $sector = Sector::findOrFail($sector);

        $sector->update(request()->all());

        return redirect()->route('sector.index')
            ->with('success', 'Setor "' . $sector->name . '" editado com sucesso!');
    }

    public function destroy($sector)
    {
        $sector = Sector::findOrFail($sector);
        $sector->delete();

        return redirect()->route('sector.index')
            ->with('success', 'Setor "' . $sector->name . '" removido com sucesso!');
    }

}
