<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
        use HasFactory;

            protected $fillable = [
        'quantity',
    ];

        //relaciones
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Service::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

}
