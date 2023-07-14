<?php

namespace App\Imports;

use App\Models\NilaiGejalaKategori;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiGejalaKategoriImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NilaiGejalaKategori([
            'kategori_id' => $row['kategori_id'],
            'gejala_id'   => $row['gejala_id'],
            'nilai'       => $row['nilai']
        ]);
    }
}
