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
            $demands = Demand::orderBy('id', 'asc')->paginate(4);
        } else {
            $demands = auth()->user()->demands()->orderBy('id', 'asc')->paginate(5);
        }

        $model = Demand::class;

        return view('livewire.demands-index')
                ->with(['demands' => $model::where('title', 'ilike', '%'.$this->searchString.'%' ?? '' )
                ->orderBy('id', 'asc')
                ->paginate(5)]);
    }

}
