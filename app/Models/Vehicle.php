<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    use HasFactory;
        protected $fillable = [
        'brand',
    ];

    //relaciones
    public function delivery() {
        return $this->belongsTo(Delivery::class);
    }
}
