<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function cleaning()
    {
        return $this->hasMany(Cleaning::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function reservationTask()
    {
        return $this->hasMany(ReservationTask::class);
    }

}

