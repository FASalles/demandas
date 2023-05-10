<?php

namespace App\Http\Livewire;

use App\Models\Demand;
use Livewire\Component;
use Livewire\WithPagination;

class DemandsIndex extends Component
{
    use WithPagination;

    public $searchString = '';

    public function updatedSearchString()
    {
        $this->resetPage();
    }

    public function render()
    {
        if (auth()->user()->isAn('admin')) {
            $model = Demand::class;
        } else {
            $model = auth()->user()->demands()->getQuery();
        }

        return view('livewire.demands-index', [
            'demands' => $model->where('title', 'ilike', '%'.$this->searchString.'%')
                ->orderBy('id', 'asc')
                ->paginate(5)
        ]);

    }

}
