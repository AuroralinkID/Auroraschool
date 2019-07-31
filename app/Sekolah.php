<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    protected $table = "sekolahs";
    protected $fillable = [
        'nama_sekolah',
        'alamat_sekolah',
        'nis',
        'telepon',
        'email',
        'kota'       
    ];
}
