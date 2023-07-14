<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $primaryKey = 'jadwal_id';

    protected $fillable = [
        'konseling_id',
        'tanggal_konseling'
    ];

    public function konseling()
    {
        return $this->belongsTo(Konseling::class,'konseling_id','konseling_id');
    }

    public function sesi_online()
    {
        return $this->hasOne(SesiOnline::class,'jadwal_id','jadwal_id');
    }
}
