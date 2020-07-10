<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAngkatan extends Model
{
    //
    protected $table = 'tahun_angkatan';
    protected $fillable = ['id_tahun_angkatan', 'tahun'];
}
