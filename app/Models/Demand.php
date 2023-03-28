<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

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


