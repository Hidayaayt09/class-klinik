<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';

    protected $primaryKey = 'gejala_id';

    protected $fillable = [
        'gejala_id',
        'kategori_id',
        'nama_gejala'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id','kategori_id');
    }

    public $incrementing = false;
}
