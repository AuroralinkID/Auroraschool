<?php

namespace App\Exports;

use App\sekolah;
use Maatwebsite\Excel\Concerns\FromCollection;

class SekolahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return sekolah::all();
    }
}
