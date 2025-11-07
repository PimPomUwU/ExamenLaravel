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

    protected $allowIncluded = [
        'users',
    ];


    // Campos por los que se puede ordenar
    protected $allowSort = [
        'id',
        'name',

    ];

    //relaciones
    public function users () {
       return $this->belongsToMany(User::class);
    }

            public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request("included"))) {
            return;
        }

        $relations = explode(',', request('included'));

        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {

            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

}
