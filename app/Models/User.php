<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'country',
        'phone',
        'password_hash',
    ];



//relaciones
    public function rols () {
       return $this->belongsToMany(Rol::class);
    }

    public function delivery () {
       return $this->hasOne(Delivery::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
/*     protected $hidden = [
        'password',
        'remember_token',
    ]; */

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
 /*    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    } */
}
