<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'body',
            'users_id',
            'sectors_id',
            'system_id',
            'demands_type_id',
            'attached_issue',
            'budgeted_hours',
            'responsible_id',
            'started_at',
            'ended_at',
            'image'
        ];

    protected $with = ['user'];



    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sectors_id');
    }

    public function system()
    {
        return $this->belongsTo(System::class, 'system_id');
    }
}


