<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillofLading extends Model
{
    public function cargo() {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }
    public function package() {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function manifest() {
        return $this->belongsTo(Manifest::class, 'manifest_id');
    }
}
