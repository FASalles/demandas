<?php

namespace App\Http\Livewire;

use App\Data\Repositories\Systems;
use Livewire\Component;
use App\Models\System;
use Livewire\WithPagination;


class SystemsIndex extends Component
{
    use WithPagination;

    public $searchString = '';

    public function updatedSearchString()
    {
        $this->resetPage();
    }

    public function render(System $system)
    {
        $model = System::class;

        return view('livewire.systems-index')->with(['systems' => $model::where('name', 'ilike', '%'.$this->searchString.'%' ?? '' )
            ->orderBy('id', 'asc')->paginate(5)]);
    }
}
