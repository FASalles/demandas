<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(5);

        return view('user.index', compact('users'));
    }

    public function show()
    {
        $users = User::orderBy('id', 'asc')->paginate(5);

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.form');
    }

    public function store(UserRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->login = $request->email;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'Usuário(a) "' . $user->name . '" adicionado com sucesso!');
    }

    public function edit($user)
    {
        $user = User::findOrFail($user);

        return view('user.edit', compact('user'));
    }

    public function update($user, SystemRequest $request)
    {


        $user = User::findOrFail($user);

        $user->update($request->all());

        return redirect()->route('user.index')
            ->with('success', 'Usuário(a) "' . $user->name . '" editado com sucesso!');
    }

    public function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Usuário(a) "' . $user->name . '" removido com sucesso!');
    }
}
