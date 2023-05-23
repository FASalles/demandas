<?php

namespace App\Http\Livewire;

use App\Data\Repositories\Users;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
            'search' => ['except' => ''],
            'page' => ['except' => 1]
        ];

    public function updatedSearchString()
    {
        $this->resetPage();
    }

    public function render(User $user)
    {
        $model = User::class;

        return view('livewire.users-index')->with(['users' => $model::where('name', 'ilike', '%'.$this->search.'%' ?? '' )
            ->orderBy('id', 'asc')->paginate(5)]);
    }
}
