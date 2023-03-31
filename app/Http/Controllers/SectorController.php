<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::all();

        return view('sector.index', compact('sectors'));
    }

    public function create()
    {
        return view('sector.form');
    }

    public function store(Request $request)
    {
        return redirect()->route('sector.index');
    }

    public function edit($sector)
    {
        return $sector;
    }
}
