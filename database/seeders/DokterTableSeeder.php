<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Seeder;
use Uuid;

class DokterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokter::create([
            'dokter_id' =>  Uuid::generate(4),
            'nama'      =>  'Dokter',
            'email'     =>  'dokter@dokter.com',
            'password'  =>  bcrypt('12345678'),
            'jenis_kelamin' => 'Laki-Laki',
            'no_wa' => '085721718411',
            'alamat' => 'Desa Kliwed Kecamatan Kertasemaya'
        ]);
    }
}
