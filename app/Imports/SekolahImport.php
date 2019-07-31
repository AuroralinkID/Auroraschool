<?php

namespace App\Imports;

use App\sekolah;
use Maatwebsite\Excel\Concerns\ToModel;

class SekolahImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new sekolah([
            //
            'nama_sekolah'     => $row['1'],
            'alamat_sekolah'    => $row['2'],
            'nis'     => $row['3'],
            'telepon'    => $row['4'],
            'email'     => $row['5'],
            'kota'    => $row['6'],
        ]);
    }
}
