<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    public function manifest() {
        return $this->belongsTo(Manifest::class, 'manifest_id');
    }
}
