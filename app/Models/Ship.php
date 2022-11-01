<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public function shiptype() {
        return $this->belongsTo(ShipType::class, 'ship_type');
    }
    public function trip() {
        return $this->hasMany(Trip::class);
    }
}
