<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    public function trip() {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
