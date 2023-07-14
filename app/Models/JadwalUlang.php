<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalUlang extends Model
{
    use HasFactory;

    protected $table = 'jadwal_ulang';

    protected $primaryKey = 'jadwal_ulang_id';

    protected $fillable = [
        'konseling_id',
        'jadwal_id',
        'dari',
        'sampai'
    ];

    public function konseling()
    {
        return $this->belongsTo(Konseling::class,'konseling_id','konseling_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class,'jadwal_id','jadwal_id');
    }
}
