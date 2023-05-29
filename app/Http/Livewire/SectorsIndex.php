<?php

namespace App\Http\Livewire;

use App\Data\Repositories\Sectors as SectorsRepository;
use Livewire\Component;
use App\Models\Sector;
use Livewire\WithPagination;

class SectorsIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1]
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render(Sector $sector)
    {
        $model = Sector::class;

        return view('livewire.sectors-index')->with(['sectors' => $model::where('name', 'ilike', '%'.$this->search.'%' ?? '' )
            ->orderBy('id', 'asc')->paginate(5)]);
    }
}
