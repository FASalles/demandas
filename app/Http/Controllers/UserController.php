<?php

namespace App\Http\Controllers;

use App\Data\Repositories\Users;
use App\Http\Requests\SystemRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(User $user, Users $repository)
    {
        $this->user = $user;
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->user->orderBy('id', 'asc')->paginate(5);

        return view('user.index', compact('users'));
    }

    public function show()
    {
        $users = $this->user->orderBy('id', 'asc')->paginate(5);

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.form');
    }

    public function store(UserRequest $request)
    {
        $user = $this->repository->add($request);

        return redirect()->route('user.index')
            ->with('success', 'Usuário(a) "' . $user->name . '" adicionado com sucesso!');
    }

    public function edit($user)
    {
        $user = $this->user->findOrFail($user);

        return view('user.edit', compact('user'));
    }

    public function update($user, SystemRequest $request)
    {


        $user = $this->user->findOrFail($user);

        $user->update($request->all());

        return redirect()->route('user.index')
            ->with('success', 'Usuário(a) "' . $user->name . '" editado com sucesso!');
    }

    public function destroy($user)
    {
        $user = $this->user->findOrFail($user);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Usuário(a) "' . $user->name . '" removido com sucesso!');
    }
}
