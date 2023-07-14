<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konseling extends Model
{
    use HasFactory;

    protected $table = 'konseling';

    protected $primaryKey = 'konseling_id';

    protected $fillable = [
        'user_id',
        'kategori_id',
        'jenis_sesi',
        'harga',
        'bukti_pembayaran',
        'status',
        'status_sesi'
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id','kategori_id');
    }

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class,'konseling_id','konseling_id');
    }

    public function jadwalulang()
    {
        return $this->hasMany(JadwalUlang::class,'jadwal_ulang_id','jadwal_ulang_id');
    }
}
