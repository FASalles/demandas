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
            'user_id',
            'sector_id',
            'system_id',
            'demands_type_id',
            'attached_issue',
            'budgeted_hours',
            'responsible_id',
            'started_at',
            'ended_at',
            'image'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sector()
    {
        return $this->belongsTo(User::class);
    }

    public function system()
    {
        return $this->belongsTo(User::class);
    }
}


