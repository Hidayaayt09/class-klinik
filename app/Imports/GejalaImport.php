<?php

namespace App\Imports;

use App\Models\Gejala;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GejalaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Gejala([
            'gejala_id'   => $row['gejala_id'],
            'nama_gejala' => $row['nama_gejala']
        ]);
    }
}
