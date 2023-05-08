<?php

namespace App\Http\Livewire;

use App\Models\Demand;
use App\Models\Sector;
use App\Models\System;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class DemandsCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $attached_issue;
    public $budgeted_hours;
    public $sectors_id;
    public $users_id;
    public $systems_id;
    public $demands_type_id;
    public $started_at;
    public $ended_at;
    public $image;


    public function render()
    {
        $sectors = Sector::all();
        $users = User::all();
        $systems = System::all();
        $demands = Demand::all();

        return view('livewire.demands-create',
            ['sectors' => $sectors,
            'users' => $users,
            'systems' => $systems,
            'demands' => $demands]);
    }
}
