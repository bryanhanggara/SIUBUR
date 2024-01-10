<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',   
        'ttl',
        'jabatan_id',
        'tanggal_lhr',
        'image_profile',
        'alamat',
        'jk'

    ];

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
        'password' => 'hashed',
    ];

    public function jabatan() {
        return $this->belongsTo(
            Jabatan::class,'jabatan_id','id'
        );
    }

    public function absens() {
        return $this->hasMany(
            Absensi::class, 'user_id', 'id'
        );
    }

    public function report()
    {
        return $this->hasMany(
            Report::class, 'user_id','id'
        );
    }
}
