<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';

    protected $primaryKey = 'testimoni_id';

    protected $fillable = [
        'user_id',
        'deskripsi'
    ];

    public function pasien()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
