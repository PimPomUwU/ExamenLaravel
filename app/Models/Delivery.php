<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Delivery extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'gender',
        'birth_date',
        'vehicle_type',
        'dni_document_front',
        'dni_document_back',
        'driving_license',
        'transit_license',
        'mandatory_insurance',
        'profile_photo',
        'user_id',
    ];


    protected $allowIncluded = [
        'vehicle',
        'user',
    ];

    // Campos por los que se puede filtrar
    protected $allowFilter = [
        'id',
        'vehicle',
        'user_id',
        'created_at',
        'updated_at'
    ];

    // Campos por los que se puede ordenar
    protected $allowSort = [
        'id',
        'birth_date',
        'created_at',
        'updated_at'
    ];

    //relaciones
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function vehicle() {
        return $this->hasOne(Vehicle::class);
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

    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request("filter"))) {
            return;
        }

        $filters = request('filter');

        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {

            if ($allowFilter->contains($filter)) {
                $query->WHERE($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }

    public function scopeSort(Builder $query)
    {

        if (empty($this->allowSort) || empty(request("sort"))) {
            return;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);

        foreach ($sortFields as $sortField) {

            $direction = 'asc';

            if (substr($sortField, 0, 1) === "-") {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }

            //return $sortField;

            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }
    }

    public function scopeGetOrPaginate(Builder $query)
    {
        if (request('perPage')) {
            $perPage = intval(request('perPage'));
            if ($perPage) {
                return $query->paginate($perPage);
            }
        }

        return $query->get();
    }
}
