<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DemandsController extends Controller
{
    public function index()
    {
        $demands = Post::all();

        return view('demands.index', compact('demands'));
    }

    public function create()
    {
        return view('demands.create');
    }
}
