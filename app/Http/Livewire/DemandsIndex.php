<?php

namespace App\Http\Livewire;

use App\Models\Demand;
use Livewire\Component;
use Livewire\WithPagination;

class DemandsIndex extends Component
{
    use WithPagination;

    public $paginationRange = 5;

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
        if (auth()->user()->isAn('admin')) {
            $model = Demand::query();
        } else {
            $model = auth()->user()->demands()->getQuery();
        }

        return view('livewire.demands-index', [
            'demands' => $model->where('title', 'ilike', '%'.$this->search.'%')
                ->orderBy('id', 'asc')
                ->paginate(5)
        ]);
    }

}
