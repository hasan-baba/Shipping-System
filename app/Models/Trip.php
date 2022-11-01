<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    public function ship() {
        return $this->belongsTo(Ship::class, 'ship_name_id');
    }
    public function cargo() {
        return $this->belongsTo(Cargo::class, 'cargo_name_id');
    }
    public function port() {
        return $this->belongsTo(Port::class, 'port_name_id');
    }
    public function agency() {
        return $this->belongsTo(Agency::class, 'agency_name_id');
    }
    public function package() {
        return $this->belongsTo(Package::class, 'package_name_id');
    }
    public function crew() {
        return $this->hasMany(Crew::class);
    }
    public function manifest() {
        return $this->hasMany(Manifest::class);
    }
}
