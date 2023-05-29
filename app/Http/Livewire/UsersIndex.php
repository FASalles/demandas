<?php

namespace App\Http\Livewire;

use App\Data\Repositories\Users;
use Illuminate\Database\Eloquent\Builder;
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

    public function updatedSearc()
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

//public function render(User $user)
//{
//    $query = User::query();
//
//    if ($this->search) {
//        $query->where(function (Builder $query) {
//            $query->where('name', 'ilike', '%' . $this->search . '%')
//                ->orWhereRaw("pg_trgm.similarity(name, ?) > 0.3", [$this->search])
//                ->orderByRaw("pg_trgm.similarity(name, ?) desc", [$this->search]);
//        });
//    }
//
//    return view('livewire.users-index')->with([
//        'users' => $query->orderBy('id', 'asc')->paginate(5)
//    ]);
//}
