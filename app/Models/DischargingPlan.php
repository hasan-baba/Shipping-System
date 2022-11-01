<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DischargingPlan extends Model
{
    public function cargo() {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }
}
