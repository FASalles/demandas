<?php

namespace App\Http\Controllers;

use App\Data\Repositories\Sectors;
use App\Http\Requests\SectorRequest;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{

    public function __construct(Sector $sector, Sectors $repository)
    {
        $this->model = $sector;
        $this->repository = $repository;
    }

    public function index()
    {
        $sectors = $this->model->orderBy('id', 'asc')->paginate(5);

        return view('sectors.index', compact('sectors'));
    }



    public function show($sector)
    {
        $sectors = $this->model->orderBy('id', 'asc')->paginate(5);

        return view('sector.index', compact('sectors'));
    }

    public function create()
    {
        return view('sector.form');
    }

    public function store(SectorRequest $request)
    {

        $sector = $this->repository->add($request);

        return redirect()->route('sector.index')
            ->with('success', 'Setor "' . $sector->name . '" criado com sucesso!');
    }

    public function edit($sector)
    {
        $sector = $this->model->findOrFail($sector);

        return view('sector.edit', compact('sector'));
    }


    public function update($sector, SectorRequest $request)
    {
        $sector = $this->model->findOrFail($sector);

        $sector->update(request()->all());

        return redirect()->route('sector.index')
            ->with('success', 'Setor "' . $sector->name . '" editado com sucesso!');
    }

    public function destroy($sector)
    {
        $sector = $this->model->findOrFail($sector);
        $sector->delete();

        return redirect()->route('sector.index')
            ->with('success', 'Setor "' . $sector->name . '" removido com sucesso!');
    }

}
