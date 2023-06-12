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

    public function render()
    {
        $sectors = Sector::where(function ($query) {
            $query->where('name', 'ILIKE', '%' . $this->search . '%')
                ->orWhere(function ($query) {
                    $query->whereRaw("similarity(name, ?) > 0.6", [$this->search])
                        ->orderByRaw("similarity(name, ?) DESC", [$this->search]);
                });
        })
            ->paginate(5);

        return view('livewire.sectors-index', compact('sectors'));
    }
}

