<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiOnline extends Model
{
    use HasFactory;

    protected $table = 'sesi_online';

    protected $primaryKey = 'sesi_id';

    protected $fillable = [
        'jadwal_id',
        'receiver',
        'sender',
        'pesan'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class,'jadwal_id','jadwal_id');
    }
}
