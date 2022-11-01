<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipType extends Model
{
    public function ship() {
        return $this->hasMany(Ship::class);
    }
}
