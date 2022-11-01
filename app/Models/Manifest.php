<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
    public function trip() {
        return $this->belongsTo(Trip::class, 'trip_number_id');
    }
    public function bills() {
        return $this->hasMany(BillofLading::class);
    }
}
