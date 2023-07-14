<?php

namespace App\Imports;

use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KategoriImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kategori([
            // 'kategori_id' => $row['kategori_id'],
            'nama'        => $row['nama'],
            'harga'       => $row['harga'],
            'deskripsi'   => $row['deskripsi'],
            'foto'        => $row['foto']
        ]);
    }
}
