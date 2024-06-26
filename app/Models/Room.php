<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'room_type_id', 'image', 'is_active'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function cleanings()
    {
        return $this->hasManyThrough(Cleaning::class, Reservation::class);
    }
}


