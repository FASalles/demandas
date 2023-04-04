<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::orderBy('id', 'asc')->paginate(5);

        return view('sector.index', compact('sectors'));
    }

    public function create()
    {
        return view('sector.form');
    }

    public function store(Request $request)
    {
//        return view('sector.form');

        $sector = new Sector();

        $sector->id = $request->id;
        $sector->name = $request->name;
        $sector->created_at = $request->created_at;
        $sector->updated_at = $request->updated_at;

        $sector->save();

        return redirect()->route('sector.index')
            ->with('success', 'Setor "' . $sector->name . '" adicionado com sucesso!');
    }

    public function edit($sector)
    {
        $sector = Sector::findOrFail($sector);

        return view('sector.edit', compact('sector'));
    }

    public function update($sector)
    {
        $sectors = Sector::all();

        $sector = Sector::findOrFail($sector);

        $sector->update(request()->all());

        return redirect()->route('sector.index')
            ->with('success', 'Setor "' . $sector->name . '" editado com sucesso!');
        //return view('sector.index', compact('sectors'));
    }

    public function destroy($sector)
    {
        $sector = Sector::findOrFail($sector);
        $sector->delete();

        return redirect()->route('sector.index')
            ->with('success', 'Setor "' . $sector->name . '" removido com sucesso!');
    }

}
