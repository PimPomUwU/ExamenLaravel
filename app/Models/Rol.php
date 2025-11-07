<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Rol extends Model
{
    use HasFactory;
    //
        protected $fillable = [
        'name',
    ];


    //relaciones
    public function users () {
       return $this->belongsToMany(User::class);
    }

}
