<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = ['table_number', 'capacity', 'is_available'];

    public function currentReservation()
    {
        return $this->hasOne(Reservation::class)
            ->whereDate('reservation_time', now())
            ->where('status', 'confirmed')
            ->orderBy('reservation_time');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
