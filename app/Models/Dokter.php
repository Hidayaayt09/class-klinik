<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dokter extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'dokter';

    protected $table = 'dokter';

    protected $primaryKey = 'dokter_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dokter_id',
        'nama',
        'username',
        'email',
        'password',
        'jenis_kelamin',
        'no_wa',
        'alamat',
        'fcm_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public $incrementing = false;
}
