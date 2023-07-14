<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $primaryKey = 'kategori_id';

    protected $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'foto'
    ];

    public function gejala()
    {
        return $this->hasMany(Kategori::class,'kategori_id','kategori_id');
    }

    public $incrementing = false;
}
