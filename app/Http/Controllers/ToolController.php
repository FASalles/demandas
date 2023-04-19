<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class ToolController extends Controller
{
    public function index()
    {
        return view('tool.index');
    }
}
