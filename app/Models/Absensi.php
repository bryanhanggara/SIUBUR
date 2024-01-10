<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Absensi extends Model
{
    use HasFactory;
    protected $dates = ['jam_masuk', 'jam_pulang', 'created_at'];

    protected $fillable = [
        'user_id',
        'jam_masuk',
        'jam_pulang',
        'selisih_jam',
        'gaji'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class, 'jabatan_id', 'id');
    }
}
