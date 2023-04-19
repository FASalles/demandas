<?php

namespace App\Http\Livewire;

use App\Data\Repositories\Sectors as SectorsRepository;
use Livewire\Component;
use App\Http\Livewire\BaseIndex;

class SectorsIndex extends BaseIndex
{
    protected $repository = SectorsRepository::class;

    public $orderByField = 'name';
    public $orderByDirection = 'asc';
    public $paginationEnabled = true;

    public $searchFields = [
        'sectors.name' => 'text',
    ];

    public function render()
    {
        return view('livewire.sectors.index')->with(['sectors' => $this->filter()]);
    }
}
