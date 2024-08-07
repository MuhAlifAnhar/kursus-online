<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    public function hasil()
    {
        return $this->hasMany(Hasil::class, 'user_id', 'id');
    }

    // public function materiUsers()
    // {
    //     return $this->hasMany(Hasil::class, 'user_id', 'id');
    // }

    // public function matpels()
    // {
    //     return $this->hasMany(Matpel::class, 'id_guru');
    // }

    // public function user()
    // {
    //     return $this->hasMany(Quiz::class, 'guru_id');
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
