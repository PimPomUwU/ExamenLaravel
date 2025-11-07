<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function user () {
        return $this->belongsTo(User::class);
    }
}
